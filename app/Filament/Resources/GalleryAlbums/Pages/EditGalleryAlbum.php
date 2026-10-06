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
        $photos = $this->data['gallery_photos'] ?? null;
        if (is_array($photos)) {
            $existingItems = $this->record->items()->get();
            $existingPaths = $existingItems->pluck('file_path')->toArray();
            
            // Tambahkan foto baru yang belum tersimpan di database
            $maxSort = $this->record->items()->max('sort_order') ?? 0;
            foreach ($photos as $photoPath) {
                if ($photoPath && is_string($photoPath) && !in_array($photoPath, $existingPaths)) {
                    $maxSort++;
                    $this->record->items()->create([
                        'file_path' => $photoPath,
                        'aspect_ratio' => '1:1',
                        'sort_order' => $maxSort,
                        'is_featured' => false,
                    ]);
                }
            }

            // Hapus item foto yang di-remove dari form file upload
            foreach ($existingItems as $item) {
                if (!in_array($item->file_path, $photos) && $item->file_path !== $this->record->thumbnail) {
                    $item->delete();
                }
            }
        }
    }
}

