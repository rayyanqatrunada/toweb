<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Facades\Filament;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use SensitiveParameter;

class EditProfile extends BaseEditProfile
{
    public static function getLabel(): string
    {
        return 'Profil Admin';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Profil Admin';
    }

    public function getHeading(): string|Htmlable
    {
        return 'Pengaturan Profil Admin';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Kelola informasi nama pengguna dan kata sandi untuk akun administrator sistem.';
    }

    public function getBreadcrumbs(): array
    {
        return [
            filament()->getUrl() => 'Dashboard',
            'Profil Admin',
        ];
    }

    public function defaultForm(Schema $schema): Schema
    {
        return parent::defaultForm($schema)->inlineLabel(false);
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Nama Lengkap')
            ->placeholder('Masukkan nama lengkap Anda')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->placeholder('admin@toweb.test')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true)
            ->live(debounce: 500);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi Baru')
            ->placeholder('Minimal 8 karakter')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->rule(Password::min(8))
            ->autocomplete('new-password')
            ->helperText('Kosongkan jika Anda tidak ingin mengubah kata sandi.')
            ->dehydrated(fn (#[SensitiveParameter] ?string $state): bool => filled($state))
            ->dehydrateStateUsing(fn (#[SensitiveParameter] ?string $state): string => Hash::make($state))
            ->live(debounce: 500)
            ->same('passwordConfirmation');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label('Konfirmasi Kata Sandi Baru')
            ->placeholder('Ulangi kata sandi baru')
            ->password()
            ->autocomplete('new-password')
            ->revealable(filament()->arePasswordsRevealable())
            ->required(fn (Get $get): bool => filled($get('password')))
            ->visible(fn (Get $get): bool => filled($get('password')))
            ->dehydrated(false);
    }

    protected function getCurrentPasswordFormComponent(): Component
    {
        return TextInput::make('currentPassword')
            ->label('Kata Sandi Saat Ini')
            ->placeholder('Masukkan kata sandi saat ini')
            ->helperText('Wajib dimasukkan untuk memverifikasi perubahan kata sandi baru atau alamat email.')
            ->password()
            ->autocomplete('current-password')
            ->currentPassword(guard: Filament::getAuthGuard())
            ->revealable(filament()->arePasswordsRevealable())
            ->required(fn (Get $get): bool => filled($get('password')) || ($get('email') !== $this->getUser()->getAttributeValue('email')))
            ->visible(fn (Get $get): bool => filled($get('password')) || ($get('email') !== $this->getUser()->getAttributeValue('email')))
            ->dehydrated(false);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Akun Admin')
                    ->description('Perbarui informasi nama tampilan dan alamat surel akun administrator sistem.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ])
                    ->columns(2),

                Section::make('Keamanan & Kata Sandi')
                    ->description('Perbarui kata sandi secara berkala untuk menjaga keamanan akses portal admin TBSM.')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        $this->getCurrentPasswordFormComponent()->columnSpanFull(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->columns(2),
            ]);
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Simpan Perubahan Profil')
            ->icon('heroicon-m-check')
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('back')
            ->label('Batal / Kembali ke Dashboard')
            ->icon('heroicon-m-arrow-left')
            ->url(filament()->getUrl())
            ->color('gray');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Profil berhasil diperbarui')
            ->body('Informasi akun dan kredensial administrator Anda telah berhasil disimpan.');
    }
}
