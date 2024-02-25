<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;


class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationGroup = "Data";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(true)->placeholder("Masukan Judul")->columnSpanFull(),
                Textarea::make("description")->required(true)->placeholder("Short Descriptions")->columnSpanFull(),
                TextInput::make("location")->maxLength(40),
                DatePicker::make("article_date")
                    ->label("Tanggal Artikel")
                    ->format("Y-m-d")
                    ->default(now()->format("Y-m-d"))
                    ->native(false)
                    ->displayFormat("d/m/Y"),
                FileUpload::make("cover")
                    ->disk("public")
                    ->directory("/article/cover")
                    ->required(true)
                    ->imagePreviewHeight('225')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('400'),
                TinyEditor::make('content')
                    ->required(true)
                    ->setRelativeUrls(false)
                    ->placeholder("Contents")
                    ->fileAttachmentsDisk("public")
                    ->fileAttachmentsDirectory("/article/attachments"),
                Radio::make('status')
                    ->required()
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published'
                    ])
                    ->descriptions([
                        'draft' => 'Is not visible.',
                        'published' => 'Is visible.'
                    ])
                    ->columnSpanFull(),
                Toggle::make('is_featured')->label("Featured")->default("false")
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                ImageColumn::make("cover")
                    ->disk("public")
                    ->size(100),
                TextColumn::make("title")
                    ->description(fn (Article $record): string => $record->description)->limit(20),
                TextColumn::make("location"),
                TextColumn::make("article_date")
                    ->label("Article Date")
                    ->dateTime("d/m/Y"),
                TextColumn::make("slug"),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        "draft" => "Draft",
                        "published" => "Published"
                    })
                    ->color(fn (string $state) => match ($state) {
                        "draft" => "gray",
                        "published" => "success"
                    }),
                TextColumn::make('is_featured')
                    ->label('Featured')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state) =>
                        $state ? "Featured" : "Not Featured"
                    )
                    ->color(fn (string $state) =>
                    $state ? "success" : "gray")

            ])
            ->filters([
                Filter::make("is_featured")
                ->query(fn (Builder $query) : Builder => $query->where("is_featured", true))
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
