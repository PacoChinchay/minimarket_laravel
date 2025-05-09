<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $table = 'users';

    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'role_id' => 'required|in:'.Role::CLIENTE.','.Role::EMPLEADO.','.Role::ADMINISTRADOR
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/users');
    }

    public function edit($user) {
        $user = User::find($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $user) {
        $user = User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/users');
    }

    public function destroy($user) {
        $user = User::find($user);
        $user->delete();
        return redirect('/users');
    }

}
