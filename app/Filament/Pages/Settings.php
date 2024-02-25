<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Cache;

class Settings extends Page
{
    public ?array $data = [];

    protected static ?string $navigationGroup = 'Site Setting';
    protected static ?string $navigationLabel = 'Global Setting';

    protected static string $view = 'filament.pages.settings';

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make("Site Setting")
                ->description("Pengaturan informasi website")
                ->schema([
                    TextInput::make("title")->nullable(false),
                    TextInput::make("description")->nullable(false),
                    TextInput::make("phone")->nullable(false),
                    FileUpload::make("logo")
                        ->disk("local")
                        ->directory("/public/setting/logo")
                        ->visibility("public")
                        ->image()
                        ->imageEditor(),
                    TextInput::make("email")->email(true),
                    TextInput::make("address")->nullable(false),
                    TextInput::make("map_link")->label("Map Link"),
                    KeyValue::make('social_media')
                        ->keyLabel("Nama")
                        ->valueLabel("Link")
                        ->addable(false)
                        ->editableKeys(false)
                        ->deletable(false)
                ])
        ])->statePath("data");
    }

    public function mount(): void
    {

        abort_unless(auth()->user()->is_admin, 403);

        $this->form->fill($this->getSettingData());
    }


    public static function shouldRegisterNavigation() : bool
    {
        return auth()->user()->is_admin;
    }

    protected function getSettingData(): array
    {
        $data = cache()->get("global.setting" , Setting::query()
            ->where("type", "global")
            ->first()?->data ?? []);

        return array_merge([
                "phone" => "",
                "title" => "",
                "description" => "",
                "address" => "",
                "email" => "",
                "map_link" => "",
                "logo" => "",
                "social_media" => [
                    "Google" => "",
                    "Facebook" => "",
                    "Instagram" => ""
                ]
            ], $data);
    }

    protected function getFormActions(): array
    {

        return [
            Action::make('save')
                ->label("Simpan")
                ->submit('save')
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            Setting::query()->where("type", "global")
                ->update([
                    "data" => $data
                ]);

            Cache::set("global.setting", $data);

            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->send();

        } catch (Halt $exception) {
            Notification::make()
            ->title('Something Error')
            ->danger()
            ->send();
            return;
        }
    }

}
