<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = "Data";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make("User Form")
                ->description("Manage User")
                ->schema([
                TextInput::make("name")->required(),
                TextInput::make("email")->required(),
                TextInput::make("password")->password()->required()->confirmed(),
                TextInput::make("password_confirmation")->password()->required(),
                Toggle::make("is_admin")->label("Admin")
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make("email"),
                TextColumn::make("name"),
                TextColumn::make('is_admin')
                    ->label('Admin')
                    ->badge()
                    ->formatStateUsing(fn(string $state) => 
                        $state ? "Admin" : "User"
                    )
                    ->color(fn(string $state) => 
                        $state ? "primary" : "success")
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
