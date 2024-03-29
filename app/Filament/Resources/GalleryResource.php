<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationGroup = 'Media';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('galleries')
                    ->schema([
                        TextInput::make("title"),
                        FileUpload::make("media")
                            ->disk("public")
                            ->directory("/popup/media")
                            ->required(true)
                            ->imageCropAspectRatio("16:9")
                            ->imageResizeTargetWidth("640")
                            ->image()
                            ->maxSize(2000)
                            ->imageResizeMode("cover")
                            ->columnSpanFull(),
                        Toggle::make("is_featured")->label("Featured")
                    ])

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make("title"),
                ImageColumn::make("media")
                    ->disk("public")
                    ->size(100),
                TextColumn::make('is_featured')
                    ->label('Featured')
                    ->badge()
                    ->formatStateUsing(
                        fn(string $state) =>
                        $state ? "Featured" : "Not Featured"
                    )
                    ->color(fn(string $state) =>
                        $state ? "success" : "gray")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(
                        fn(Form $form) =>
                        $form->schema([
                            TextInput::make("title"),
                            FileUpload::make("media")
                                ->disk("public")
                                ->directory("/popup/media")
                                ->required(true)
                                ->image()
                                ->imageResizeMode("cover")
                                ->columnSpanFull(),
                            Toggle::make("is_featured")->label("Featured")
                        ])
                    ),
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
            'index' => Pages\ManageGalleries::route('/'),
        ];
    }
}
