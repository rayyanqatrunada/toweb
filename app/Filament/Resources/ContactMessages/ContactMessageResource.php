<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\ListContactMessages;
use App\Filament\Resources\ContactMessages\Pages\ViewContactMessage;
use App\Models\ContactMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;
    protected static string | \UnitEnum | null $navigationGroup = 'Pusat Layanan';
    protected static ?string $navigationLabel = 'Pesan Kontak';
    protected static ?string $modelLabel = 'Pesan Kontak';
    protected static ?string $pluralModelLabel = 'Pesan Kontak';

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_read', false)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Jumlah pesan masuk yang belum dibaca';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nama Pengirim')
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('email')
                    ->label('Alamat Email')
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('subject')
                    ->label('Subjek Pesan')
                    ->disabled(),
                \Filament\Forms\Components\Textarea::make('message')
                    ->label('Isi Pesan')
                    ->disabled()
                    ->columnSpanFull()
                    ->rows(6),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('is_read')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Dibaca' : 'Baru')
                    ->color(fn (bool $state): string => $state ? 'gray' : 'danger')
                    ->icon(fn (bool $state): string => $state ? 'heroicon-m-check' : 'heroicon-m-envelope')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Pengirim')
                    ->weight(fn ($record) => ! $record->is_read ? \Filament\Support\Enums\FontWeight::Bold : null)
                    ->description(fn ($record) => $record->email)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subject')
                    ->label('Subjek')
                    ->weight(fn ($record) => ! $record->is_read ? \Filament\Support\Enums\FontWeight::Bold : null)
                    ->searchable()
                    ->limit(35)
                    ->tooltip(fn ($record) => $record->subject),

                TextColumn::make('message')
                    ->label('Isi Pesan')
                    ->limit(45)
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('created_at')
                    ->label('Diterima')
                    ->dateTime('d M Y, H:i')
                    ->description(fn ($record) => $record->created_at?->diffForHumans())
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('is_read')
                    ->label('Status Pesan')
                    ->options([
                        '0' => 'Belum Dibaca (Baru)',
                        '1' => 'Sudah Dibaca',
                    ]),
            ])
            ->actions([
                \Filament\Actions\ViewAction::make()
                    ->label('Buka')
                    ->icon('heroicon-o-eye'),

                \Filament\Actions\Action::make('toggleRead')
                    ->label(fn ($record) => $record->is_read ? 'Tandai Belum Baca' : 'Tandai Dibaca')
                    ->icon(fn ($record) => $record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                    ->color('gray')
                    ->action(function ($record) {
                        $record->update(['is_read' => ! $record->is_read]);
                    }),

                \Filament\Actions\Action::make('reply')
                    ->label('Balas')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('primary')
                    ->url(fn ($record) => 'mailto:' . $record->email . '?subject=' . rawurlencode('Re: ' . ($record->subject ?? 'Pesan Kontak')))
                    ->openUrlInNewTab(),

                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('markAsRead')
                        ->label('Tandai Sudah Dibaca')
                        ->icon('heroicon-o-check')
                        ->action(fn ($records) => $records->each->update(['is_read' => true]))
                        ->deselectRecordsAfterCompletion(),

                    \Filament\Actions\BulkAction::make('markAsUnread')
                        ->label('Tandai Belum Dibaca')
                        ->icon('heroicon-o-envelope')
                        ->action(fn ($records) => $records->each->update(['is_read' => false]))
                        ->deselectRecordsAfterCompletion(),

                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactMessages::route('/'),
            'view' => ViewContactMessage::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
