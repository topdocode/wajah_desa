<x-filament-panels::page>
    <x-filament::breadcrumbs :breadcrumbs="[
    '/admin/setting' => 'Site Setting',
    '#' => 'Update',
]" />
    <x-filament-panels::form wire:submit="save">
        {{$this->form}}
        
        <x-filament-panels::form.actions 
        :actions="$this->getFormActions()"
    /> 
    </x-filament-panels::form>
</x-filament-panels::page>
