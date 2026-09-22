<x-filament-panels::page>
    @php
        $record = $this->record;
        $name = $record->name ?? 'Pengirim Tanpa Nama';
        $email = $record->email ?? '-';
        $subject = $record->subject ?? '(Tanpa Subjek)';
        $message = $record->message ?? '';
        $createdAt = $record->created_at;
        
        // Generate initials
        $words = explode(' ', trim($name));
        $initials = '';
        foreach (array_slice($words, 0, 2) as $w) {
            $initials .= mb_strtoupper(mb_substr($w, 0, 1));
        }
        if (empty($initials)) {
            $initials = 'P';
        }

        $replyUrl = 'mailto:' . $email . '?subject=' . rawurlencode('Re: ' . $subject);
    @endphp

    <div class="space-y-6" x-data="{ copied: false, copiedMsg: false }">
        {{-- Card Header: Informasi Pengirim & Status --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/90 bg-white shadow-xs transition dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-100 bg-gray-50/70 px-6 py-4 dark:border-gray-800/80 dark:bg-gray-800/40">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    {{-- Avatar & Identitas Pengirim --}}
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-red-600 to-rose-700 text-base font-bold text-white shadow-md shadow-red-500/20">
                            {{ $initials }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h2 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $name }}
                                </h2>
                                @if(! $record->is_read)
                                    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-semibold text-red-700 dark:bg-red-950/60 dark:text-red-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                        Baru
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400">
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Sudah Dibaca
                                    </span>
                                @endif
                            </div>
                            <div class="mt-0.5 flex flex-wrap items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                <a href="mailto:{{ $email }}" class="inline-flex items-center gap-1.5 font-medium text-red-600 hover:text-red-700 hover:underline dark:text-red-400">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    {{ $email }}
                                </a>
                                <button 
                                    type="button" 
                                    @click="navigator.clipboard.writeText('{{ $email }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="inline-flex items-center gap-1 rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600 transition hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <span x-show="!copied">Salin Email</span>
                                    <span x-show="copied" class="text-emerald-600 dark:text-emerald-400">Tersalin!</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Tanggal & Waktu --}}
                    <div class="flex items-center gap-2 self-start rounded-xl border border-gray-200/80 bg-white px-3.5 py-2 text-xs text-gray-600 shadow-2xs dark:border-gray-700 dark:bg-gray-800/80 dark:text-gray-300 sm:self-center">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $createdAt ? $createdAt->translatedFormat('l, d F Y • H:i') . ' WIB' : '-' }}</span>
                            <span class="text-gray-400">({{ $createdAt ? $createdAt->diffForHumans() : '' }})</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Subjek Pesan --}}
            <div class="border-b border-gray-100 bg-white px-6 py-4 dark:border-gray-800/80 dark:bg-gray-900">
                <div class="text-xs font-semibold tracking-wider text-gray-500 uppercase dark:text-gray-400">
                    Subjek Pertanyaan / Informasi:
                </div>
                <div class="mt-1 text-base font-bold text-gray-900 dark:text-white">
                    {{ $subject }}
                </div>
            </div>

            {{-- Isi Pesan --}}
            <div class="bg-white p-6 sm:p-8 dark:bg-gray-900">
                <div class="text-xs font-semibold tracking-wider text-gray-500 uppercase dark:text-gray-400">
                    Isi Pesan:
                </div>
                <div class="mt-3 rounded-xl border border-gray-100 bg-gray-50/60 p-5 text-base leading-relaxed text-gray-800 select-text dark:border-gray-800 dark:bg-gray-800/30 dark:text-gray-200">
                    {!! nl2br(e($message)) !!}
                </div>

                {{-- Action Bar Bawah --}}
                <div class="mt-6 flex flex-wrap items-center justify-between gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                    <div class="flex items-center gap-2">
                        <a 
                            href="{{ $replyUrl }}" 
                            class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                            Balas ke {{ $email }}
                        </a>

                        <button 
                            type="button" 
                            @click="navigator.clipboard.writeText('{{ addslashes($message) }}'); copiedMsg = true; setTimeout(() => copiedMsg = false, 2000)"
                            class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-2xs transition hover:bg-gray-50 hover:text-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                            <span x-show="!copiedMsg">Salin Isi Pesan</span>
                            <span x-show="copiedMsg" class="text-emerald-600 dark:text-emerald-400">Pesan Tersalin!</span>
                        </button>
                    </div>

                    <a 
                        href="{{ \App\Filament\Resources\ContactMessages\ContactMessageResource::getUrl('index') }}" 
                        class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar Pesan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
