<?php

namespace App\Filament\Resources\GalleryAlbums\Pages;

use App\Filament\Resources\GalleryAlbums\GalleryAlbumResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGalleryAlbum extends CreateRecord
{
    protected static string $resource = GalleryAlbumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $photos = $this->form->getState()['gallery_photos'] ?? $this->data['gallery_photos'] ?? [];
        if (!is_array($photos)) {
            $photos = !empty($photos) ? [$photos] : [];
        }

        if (!empty($photos)) {
            foreach ($photos as $index => $photoPath) {
                if ($photoPath instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    $photoPath = $photoPath->store('galleries/items', 'public');
                }
                if ($photoPath && is_string($photoPath)) {
                    $this->record->items()->create([
                        'file_path' => $photoPath,
                        'aspect_ratio' => '1:1',
                        'sort_order' => $index,
                        'is_featured' => $index === 0,
                    ]);
                }
            }
        } elseif (!empty($this->record->thumbnail)) {
            // Jika admin hanya mengunggah cover image, buat 1 item galeri agar foto langsung tampil di koleksi
            $this->record->items()->create([
                'file_path' => $this->record->thumbnail,
                'aspect_ratio' => '1:1',
                'sort_order' => 0,
                'is_featured' => true,
            ]);
        }
    }
}

