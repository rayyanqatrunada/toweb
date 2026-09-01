<div class="flex items-center gap-2">
    @if(file_exists(public_path('logo.png')))
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 2rem;">
    @endif
    <span class="font-bold text-xl tracking-tight" style="color: var(--tbsm-charcoal, #1B1B1E)">TBSM Admin</span>
</div>
