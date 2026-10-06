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
        $data['gallery_photos'] = $this->record->items()->pluck('file_path')->toArray();
        return $data;
    }

    protected function afterSave(): void
    {
        $photos = $this->form->getState()['gallery_photos'] ?? $this->data['gallery_photos'] ?? null;
        if (!is_array($photos) && !is_null($photos)) {
            $photos = !empty($photos) ? [$photos] : [];
        }

        if (is_array($photos)) {
            $existingItems = $this->record->items()->get();
            $existingPaths = $existingItems->pluck('file_path')->toArray();
            
            // Tambahkan foto baru yang belum tersimpan di database
            $maxSort = $this->record->items()->max('sort_order') ?? 0;
            $savedStringPaths = [];
            foreach ($photos as $photoPath) {
                if ($photoPath instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    $photoPath = $photoPath->store('galleries/items', 'public');
                }
                if ($photoPath && is_string($photoPath)) {
                    $savedStringPaths[] = $photoPath;
                    if (!in_array($photoPath, $existingPaths)) {
                        $maxSort++;
                        $this->record->items()->create([
                            'file_path' => $photoPath,
                            'aspect_ratio' => '1:1',
                            'sort_order' => $maxSort,
                            'is_featured' => false,
                        ]);
                    }
                }
            }

            // Hapus item foto yang di-remove dari form file upload
            foreach ($existingItems as $item) {
                if (!in_array($item->file_path, $savedStringPaths) && $item->file_path !== $this->record->thumbnail) {
                    $item->delete();
                }
            }
        }
    }
}

