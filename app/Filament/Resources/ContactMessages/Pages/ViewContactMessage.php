<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;

    protected string $view = 'filament.resources.contact-messages.pages.view-contact-message';

    public function mount(int | string $record): void
    {
        parent::mount($record);

        // Otomatis tandai pesan sebagai sudah dibaca saat dibuka
        if (! $this->record->is_read) {
            $this->record->update(['is_read' => true]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reply')
                ->label('Balas via Email')
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->url(fn () => 'mailto:' . $this->record->email . '?subject=' . rawurlencode('Re: ' . ($this->record->subject ?? 'Pesan Kontak')))
                ->openUrlInNewTab(),

            Action::make('toggleRead')
                ->label(fn () => $this->record->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca')
                ->icon(fn () => $this->record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                ->color('gray')
                ->action(function () {
                    $this->record->update(['is_read' => ! $this->record->is_read]);

                    Notification::make()
                        ->title($this->record->is_read ? 'Pesan ditandai sudah dibaca' : 'Pesan ditandai belum dibaca')
                        ->success()
                        ->send();
                }),

            DeleteAction::make()
                ->label('Hapus Pesan')
                ->successRedirectUrl(ContactMessageResource::getUrl('index')),
        ];
    }
}
