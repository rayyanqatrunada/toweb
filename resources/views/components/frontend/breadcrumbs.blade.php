@props(['items'])

<nav class="mb-8 flex justify-center" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-slate-500 font-medium">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">Beranda</a>
        </li>
        @foreach($items as $label => $url)
            @if($loop->last)
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 md:ml-2 text-slate-400 max-w-[150px] md:max-w-xs truncate">{{ $label }}</span>
                    </div>
                </li>
            @else
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ $url }}" class="ml-1 md:ml-2 hover:text-red-600 transition-colors">{{ $label }}</a>
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
