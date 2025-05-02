<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request) {
        // todo:validar datos
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);
        
        return redirect('/private');
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
