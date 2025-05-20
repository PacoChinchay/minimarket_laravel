<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterLoginRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register(RegisterLoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => Role::CLIENTE,
        ]);

        Auth::login($user);

        return redirect()->route('store.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (in_array($user->role_id, [
                Role::ADMINISTRADOR,
                Role::VENDEDOR,
                Role::REPARTIDOR
            ])) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended(route('store.index'));
        }

        throw ValidationException::withMessages([
            'email' => 'Sorry, incorrect credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
