<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-lg shadow max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-4">{{ $announcement->title }}</h1>
            <p class="text-sm text-gray-500 mb-6">{{ $announcement->created_at->format('d M Y') }}</p>
            
            <div class="prose max-w-none">
                {!! $announcement->content !!}
            </div>
            
            @if($announcement->file_attachment)
                <div class="mt-8 pt-4 border-t">
                    <a href="{{ Storage::url($announcement->file_attachment) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" target="_blank">
                        Download Lampiran
                    </a>
                </div>
            @endif
            
            <div class="mt-8">
                <a href="{{ route('announcements.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Pengumuman</a>
            </div>
        </div>
    </div>
</x-layouts.app>
