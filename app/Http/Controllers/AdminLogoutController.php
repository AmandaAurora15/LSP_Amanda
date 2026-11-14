<?php

namespace App\Http\Controllers;

use Filament\Auth\Http\Responses\Contracts\LogoutResponse;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class AdminLogoutController
{
    public function __invoke(Request $request): LogoutResponse
    {
        Filament::auth()->logout();

        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
