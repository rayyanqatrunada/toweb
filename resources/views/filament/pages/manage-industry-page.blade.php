<x-filament-panels::page>
    <form wire:submit="save" class="space-y-6">
        <!-- Top Info Header Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-primary-50/60 border border-primary-100 dark:bg-primary-950/20 dark:border-primary-900/40">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-primary-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                    <x-heroicon-m-presentation-chart-line class="w-5 h-5" />
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Panel Pengaturan Halaman Industri & Kemitraan Honda</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Kelola banner hero, 4 metrik kerjasama, 6 pilar Astra Honda, dan CTA BKK secara terintegrasi.</p>
                </div>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('partnership.index') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-700 text-xs font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-500" />
                    <span>Pratinjau Publik</span>
                </a>
                <x-filament::button type="submit" size="sm" icon="heroicon-m-check">
                    Simpan Perubahan
                </x-filament::button>
            </div>
        </div>

        {{ $this->form }}

        <!-- Sticky Bottom Bar for instant saving -->
        <div class="sticky bottom-4 z-20 flex flex-col sm:flex-row items-center justify-between gap-4 p-4 rounded-2xl bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border border-gray-200 dark:border-gray-800 shadow-xl">
            <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Tersedia 3 tab pengaturan kemitraan. Tekan tombol simpan untuk langsung menerapkan ke halaman web.</span>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('partnership.index') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-300 dark:border-gray-700 text-xs font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-500" />
                    <span>Lihat Halaman Publik</span>
                </a>
                <x-filament::button type="submit" icon="heroicon-m-check">
                    Simpan Pengaturan Industri
                </x-filament::button>
            </div>
        </div>
    </form>
</x-filament-panels::page>
