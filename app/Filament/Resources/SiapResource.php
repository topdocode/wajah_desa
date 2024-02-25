<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiapResource\Pages;
use App\Models\Profile;
use App\Models\Siap;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SiapResource extends Resource
{
    protected static ?string $model = Siap::class;

    protected static ?string $navigationGroup = "Site Setting";

    protected static ?string $navigationLabel = "Siap";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("title")->required()->maxLength(25)->placeholder("Judul"),
                Textarea::make("link")->placeholder("Link Url"),
                Textarea::make("description")->required()->placeholder("Deskripsi")->maxLength(150),
                FileUpload::make("logo")
                    ->disk("public")
                    ->directory("/siap/logo")
                    ->required(true)
                    ->imagePreviewHeight('250')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('4:3')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('300'),
                Toggle::make("is_active")->label("Active")->default(false)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make("title"),
                TextColumn::make("link"),
                TextColumn::make("description"),
                ImageColumn::make("logo")
                    ->disk("public")
                    ->size(100),
                TextColumn::make("author.name")->label("Author"),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiap::route('/'),
            'create' => Pages\CreateSiap::route('/create'),
            'edit' => Pages\EditSiap::route('/{record}/edit'),
        ];
    }
}
