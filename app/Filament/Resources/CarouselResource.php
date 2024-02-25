<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselResource\Pages;
use App\Models\Carousel;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;
    protected static ?string $navigationGroup  = "Site Setting";

    public static function form(Form $form): Form
    {
        return   $form->schema([
            TextInput::make("heading")->maxLength(30),
            TextInput::make("title")->maxLength(30),
            TextInput::make("info")->maxLength(50),
            FileUpload::make("image")
                ->disk("local")
                ->directory("/public/popup/media")
                ->visibility("public")
                ->imageCropAspectRatio("2:1")
                ->imageResizeTargetWidth("1200")
                ->required(true)
                ->image()
                ->imageResizeMode("cover"),
            Toggle::make("is_active")->label("Active")
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make("id"),
                TextColumn::make("heading"),
                TextColumn::make("title")
                    ->description(fn (Carousel $record) => $record->info),
                ImageColumn::make("image")
                    ->disk("local")
                    ->size(100),
                ToggleColumn::make('is_active')
                    ->label('active')
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
            'index' => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
        ];
    }
}
