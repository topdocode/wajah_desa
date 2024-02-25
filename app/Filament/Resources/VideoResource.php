<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
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

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationGroup = 'Media';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')->required(true)->placeholder("Masukan Judul")->columnSpanFull(),
                Textarea::make('description')->required(true)->placeholder("Deskripsi Pendek Video")->columnSpanFull(),
                TextInput::make("url")->required(true)->placeholder("Link youtube video")->columnSpanFull(),
                Toggle::make('is_featured')->label("Featured")->default("false")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")
                ->description(fn (Video $record): string => $record->description),
                TextColumn::make("url"),
                TextColumn::make('is_featured')
                ->label('Featured')
                ->badge()
                ->formatStateUsing(fn(string $state) => 
                    $state ? "Featured" : "Not Featured"
                )
                ->color(fn(string $state) => 
                    $state ? "success" : "gray")

            ])
            ->filters([
                //
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
            'index' => Pages\ManageVideos::route('/'),
        ];
    }    
}
