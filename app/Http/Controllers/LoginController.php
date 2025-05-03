<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required',
        ]);
    
        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'name' => $validated['name'],
            'role_id' => 1,
        ]);

        Auth::login($user);
        
        return redirect('/');
    }

    public function login(Request $request) {
        //todo: validar datos de entrada

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            // "isActive" => true
        ];

        $remember = ($request->has('remember')? true : false);

        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('private'));
        } else {
            //todo: mostrar error
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
