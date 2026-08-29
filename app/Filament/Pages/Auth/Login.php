<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;
use Filament\Actions\Action;

class Login extends BaseLogin
{
    // Gunakan custom view form
    protected string $view = 'filament.pages.auth.login';

    // Gunakan custom split-screen layout
    public function getLayout(): string
    {
        return 'filament.layouts.auth';
    }

    // Hilangkan default heading
    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return '';
    }

    // Hilangkan default logo
    public function hasLogo(): bool
    {
        return false;
    }

    // CUSTOM EMAIL FIELD: Ubah label dan placeholder sesuai brief
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email atau Username')
            ->placeholder('Masukkan email atau username')
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    // CUSTOM PASSWORD FIELD: Ubah label, placeholder, dan hapus 'Forgot Password' link
    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Password')
            ->placeholder('Masukkan password')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->required()
            ->hint(''); // Memastikan hint (lupa password) kosong/dihapus
    }

    // CUSTOM REMEMBER ME FIELD: Minimalist
    protected function getRememberFormComponent(): Component
    {
        return Checkbox::make('remember')
            ->label('Ingat saya');
    }

    // CUSTOM BUTTON LABEL: 'Masuk ke Admin'
    protected function getAuthenticateFormAction(): Action
    {
        return Action::make('authenticate')
            ->label('Masuk ke Admin')
            ->submit('authenticate');
    }

    // Autentikasi dengan Generic Error
    public function authenticate(): ?\Filament\Auth\Http\Responses\Contracts\LoginResponse
    {
        try {
            return parent::authenticate();
        } catch (ValidationException $e) {
            // Obscure the exact error untuk alasan sekuritas (Sesuai brief)
            throw ValidationException::withMessages([
                'data.email' => 'Email atau password tidak sesuai.',
            ]);
        }
    }
}
