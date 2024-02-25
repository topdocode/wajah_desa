<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationGroup = "Site Setting";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("title")->required()->maxLength(25)->placeholder("Judul"),
                Textarea::make("description")->required()->maxLength(255)->placeholder("Deskripsi singkat"),
                TinyEditor::make("content")->required()
                    ->setRelativeUrls(false)
                    ->fileAttachmentsDisk("public")
                    ->fileAttachmentsDirectory("profile"),
                Toggle::make("is_active")->label("Active")->default(false)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make("title")
                    ->description(fn (Profile $record) => str()->limit($record->description, 50)),
                TextColumn::make("slug"),
                ToggleColumn::make("is_active")->label("status"),
                TextColumn::make("created_by")->label("Author"),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
