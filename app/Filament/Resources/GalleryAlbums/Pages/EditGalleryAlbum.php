<?php

namespace App\Filament\Resources\GalleryAlbums\Pages;

use App\Filament\Resources\GalleryAlbums\GalleryAlbumResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGalleryAlbum extends EditRecord
{
    protected static string $resource = GalleryAlbumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Jangan timpa dengan item lama agar file upload hanya menerima foto baru yang ingin ditambahkan
        $data['gallery_photos'] = [];
        return $data;
    }

    protected function afterSave(): void
    {
        $photos = $this->form->getState()['gallery_photos'] ?? $this->data['gallery_photos'] ?? [];
        if (!is_array($photos)) {
            $photos = !empty($photos) ? [$photos] : [];
        }

        if (!empty($photos)) {
            $existingPaths = $this->record->items()->pluck('file_path')->toArray();
            $maxSort = $this->record->items()->max('sort_order') ?? 0;

            foreach ($photos as $photoPath) {
                if ($photoPath instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    $photoPath = $photoPath->store('galleries/items', 'public');
                }
                if ($photoPath && is_string($photoPath) && !in_array($photoPath, $existingPaths)) {
                    $maxSort++;
                    $this->record->items()->create([
                        'file_path' => $photoPath,
                        'aspect_ratio' => '1:1',
                        'sort_order' => $maxSort,
                        'is_featured' => false,
                    ]);
                    $existingPaths[] = $photoPath;
                }
            }
        }
    }
}

