<div class="tbsm-activity">
    <h3>Aktivitas Terbaru</h3>

    @forelse ($activities as $activity)
        <div class="tbsm-activity-item">
            <div class="tbsm-activity-dot"></div>
            <div class="tbsm-activity-content">
                <div class="tbsm-activity-text">{{ $activity['text'] }}</div>
                <div class="tbsm-activity-time">{{ $activity['time'] }}</div>
            </div>
        </div>
    @empty
        <div class="tbsm-empty">
            <x-filament::icon icon="heroicon-o-clock" />
            <h4>Belum ada aktivitas</h4>
            <p>Aktivitas admin akan muncul di sini.</p>
        </div>
    @endforelse
</div>
