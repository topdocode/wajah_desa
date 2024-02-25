<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporResource\Pages;
use App\Filament\Resources\LaporResource\RelationManagers;
use App\Models\Lapor;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporResource extends Resource
{
    protected static ?string $model = Lapor::class;
    protected static ?string $navigationGroup = 'Site Setting';
    protected static ?string $navigationLabel = 'Lapor';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("title")->required()->maxLength(25)->placeholder("Judul"),
                Textarea::make("link")->required()->placeholder("Link Url"),
                Toggle::make("is_active")->label("Active")->default(false)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title"),
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
            ->filters([
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
            'index' => Pages\ListLapors::route('/'),
            'create' => Pages\CreateLapor::route('/create'),
            'edit' => Pages\EditLapor::route('/{record}/edit'),
        ];
    }
}
