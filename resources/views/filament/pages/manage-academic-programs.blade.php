<x-filament-panels::page>
    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
            <x-filament::button type="submit" icon="heroicon-m-check">
                Simpan Pengaturan Akademik
            </x-filament::button>
            <a href="{{ route('academic.programs') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-500" />
                <span>Lihat Halaman Publik</span>
            </a>
        </div>
    </form>
</x-filament-panels::page>
