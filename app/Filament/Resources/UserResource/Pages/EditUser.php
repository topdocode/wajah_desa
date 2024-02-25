<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord implements HasForms
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(\Filament\Forms\Form $form): Form
    {
        return $form->schema([
            Section::make("User Form")
                ->description("Manage User")
                ->schema([
                    TextInput::make("name")->required(),
                    TextInput::make("email")->required(),
                    //TextInput::make("password")->required(),
                    Toggle::make("is_admin")->label("Admin")
                ])
                ->columns(2)
        ]);
    }
}
