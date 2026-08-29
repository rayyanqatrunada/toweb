<div class="tbsm-welcome">
    <div>
        <h2>Selamat datang kembali, {{ auth()->user()->name ?? 'Administrator' }}</h2>
        <p>Pantau konten, akademik, industri, dan aktivitas website TBSM dari satu tempat.</p>
    </div>
    <div class="tbsm-welcome-date">
        {{ now()->locale('id')->translatedFormat('l, d F Y') }}
    </div>
</div>
