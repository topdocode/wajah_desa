<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupResource\Pages;
use App\Filament\Resources\PopupResource\RelationManagers;
use App\Models\Popup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PopupResource extends Resource
{
    protected static ?string $model = Popup::class;

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(true)->placeholder("Masukan Judul")->columnSpanFull(),
                Textarea::make("description")->required(true)->placeholder("Short Descriptions")->columnSpanFull(),
                FileUpload::make("media")
                    ->disk("public")
                    ->directory("/popup/media")
                    ->visibility("public")
                    ->required(true)
                    ->imageResizeMode("cover")
                    ->imagePreviewHeight('360')
                    ->imageResizeMode('cover')
                    ->maxSize(2000)
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('640')
                    ->columnSpanFull(),
                TextInput::make('link')->placeholder("Masukan Url")->columnSpanFull(),
                Toggle::make("is_active")->label("Active")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                ImageColumn::make("file")
                    ->defaultImageUrl(url:asset("/assets/images/video.jpg"))
                    ->disk("public")
                    ->size(100),
                TextColumn::make("title")
                    ->description(fn (Popup $record): string => $record->description),
                TextColumn::make("link")->limit(20),
                TextColumn::make('is_active')
                    ->label('Active')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state) =>
                        $state ? "Active" : "Non Active"
                    )
                    ->color(fn (string $state) =>
                    $state ? "success" : "gray"),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePopups::route('/'),
        ];
    }
}
