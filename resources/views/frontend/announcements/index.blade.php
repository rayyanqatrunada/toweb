<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Pengumuman</h1>
        
        <div class="space-y-4">
            @forelse($announcements as $announcement)
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('announcements.show', $announcement->slug) }}" class="text-red-600 hover:underline">
                            {{ $announcement->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-500 mb-4">{{ $announcement->created_at->format('d M Y') }}</p>
                    <p class="text-gray-700">{{ Str::limit(strip_tags($announcement->content), 150) }}</p>
                </div>
            @empty
                    <x-empty-state title="Belum Ada Pengumuman" message="Pengumuman belum tersedia saat ini." icon="calendar" />
                @endforelse
        </div>
        
        <div class="mt-8">
            {{ $announcements->links() }}
        </div>
    </div>
</x-layouts.app>
