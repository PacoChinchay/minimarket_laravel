<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $table = 'users';

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required|in:' . Role::CLIENTE . ',' . Role::VENDEDOR . ',' . Role::ADMINISTRADOR . ',' . Role::REPARTIDOR
        ]);

       $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role_id'],
        ]);

        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function edit($user)
    {
        $user = User::find($user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user,
            'role_id' => 'required|in:1,2,3'
        ]);

        $user = User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();
        
        return redirect()->route('admin.users.index');
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
