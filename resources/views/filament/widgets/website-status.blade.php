<div class="tbsm-system-status">
    <h3>Status Sistem</h3>

    @foreach ($statuses as $status)
        <div class="tbsm-status-row">
            <span class="tbsm-status-label">
                <span class="tbsm-status-dot {{ $status['ok'] ? 'success' : 'danger' }}"></span>
                {{ $status['label'] }}
            </span>
            <span class="tbsm-status-value" style="color: {{ $status['ok'] ? 'var(--tbsm-success)' : 'var(--tbsm-danger)' }}">
                {{ $status['text'] }}
            </span>
        </div>
    @endforeach
</div>
