<div class="tbsm-activity">
    <div class="flex items-center justify-between mb-3">
        <h3 class="m-0 font-semibold text-gray-900 text-sm">Aktivitas Terakhir & Log Perubahan</h3>
        <span class="text-[10px] text-gray-500 font-mono flex items-center gap-1">
            <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block animate-pulse"></span> Audit IP Aktif
        </span>
    </div>

    @forelse ($activities as $activity)
        <div class="tbsm-activity-item py-2 border-b border-gray-100 last:border-b-0 flex gap-2.5 items-start">
            <div class="tbsm-activity-dot mt-1.5 shrink-0"></div>
            <div class="tbsm-activity-content flex-1 min-w-0">
                <div class="tbsm-activity-text text-[13px] font-medium text-gray-800 leading-snug">{{ $activity['text'] }}</div>
                
                <div class="flex flex-wrap items-center gap-2 mt-1">
                    <span class="tbsm-activity-time text-[11px] text-gray-400" title="{{ $activity['full_time'] ?? '' }}">
                        {{ $activity['time'] }}
                    </span>

                    @if(!empty($activity['ip']))
                        <span class="inline-flex items-center gap-1 font-mono text-[10px] font-semibold px-1.5 py-0.5 rounded bg-gray-100 text-gray-700 border border-gray-200" title="{{ $activity['user_agent'] ?? 'Browser Admin' }}">
                            <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                            <span>IP: {{ $activity['ip'] }}</span>
                            @if(!empty($activity['device']))
                                <span class="text-gray-400 font-normal">({{ $activity['device'] }})</span>
                            @endif
                        </span>
                    @else
                        <span class="inline-flex items-center font-mono text-[10px] text-gray-400 px-1 py-0.5 rounded bg-gray-50 border border-gray-100">
                            System/CLI
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="tbsm-empty py-6 text-center">
            <x-filament::icon icon="heroicon-o-clock" class="w-8 h-8 mx-auto text-gray-300 mb-2" />
            <h4 class="text-sm font-semibold text-gray-700">Belum ada log aktivitas</h4>
            <p class="text-xs text-gray-400 mt-1">Setiap kali admin mengubah data, rincian waktu dan alamat IP akan otomatis tercatat di sini.</p>
        </div>
    @endforelse
</div>
