<x-filament::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}

        <div class="mt-6 text-right">
            <x-filament::button type="submit" class="bg-primary-600">
                Simpan Pengaturan
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
