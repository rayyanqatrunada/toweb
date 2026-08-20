<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return new \Illuminate\Support\HtmlString('<div class="flex items-center justify-center mb-4"><div class="w-16 h-16 bg-red-600 rounded-xl flex items-center justify-center text-white font-black text-2xl shadow-lg shadow-red-600/30">TO</div></div><h2 class="text-2xl font-black tracking-tight text-center">Portal Administrasi</h2>');
    }

    public function authenticate(): ?\Filament\Auth\Http\Responses\Contracts\LoginResponse
    {
        try {
            return parent::authenticate();
        } catch (ValidationException $e) {
            // Obscure the exact error as requested
            throw ValidationException::withMessages([
                'data.email' => 'Akun atau password salah.',
            ]);
        }
    }
}
