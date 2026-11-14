<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telepon' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:16'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create($validated);

        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('web')->attempt(
            [...$credentials, 'is_admin' => false],
            $request->boolean('remember'),
        )) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang dimasukkan tidak sesuai.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
