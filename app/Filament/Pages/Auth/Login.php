<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return new \Illuminate\Support\HtmlString('<div class="flex items-center justify-center mb-4"><div class="w-16 h-16 rounded-xl flex items-center justify-center text-white font-black text-2xl shadow-lg" style="background:linear-gradient(135deg,#071BAE,#0A24DB)">TO</div></div><h2 class="text-2xl font-black tracking-tight text-center">Portal Administrasi</h2><p class="text-sm text-center text-slate-400 mt-1">Teknik Otomotif &mdash; Masuk ke panel pengelolaan</p>');
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
