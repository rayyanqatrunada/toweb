<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPostsWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Artikel Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()
                    ->with(['category', 'user'])
                    ->latest()
                    ->limit(6)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(55)
                    ->searchable()
                    ->weight(\Filament\Support\Enums\FontWeight::Medium),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->icon('heroicon-m-user'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft'     => 'warning',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'published' => 'Publikasi',
                        'draft'     => 'Draft',
                        default     => ucfirst($state),
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since()
                    ->color('gray'),
            ])
            ->actions([
                \Filament\Actions\Action::make('edit')
                    ->url(fn (Post $record): string => route('filament.admin.resources.posts.edit', $record))
                    ->icon('heroicon-m-pencil-square')
                    ->label('Edit'),
            ])
            ->paginated(false);
    }
}
