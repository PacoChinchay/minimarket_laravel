<?php

namespace App\Http\Controllers;

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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
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
        $user->type = $request->type;
        $user->save();
        return redirect('/users');
    }

    public function destroy($user) {
        $user = User::find($user);
        $user->delete();
        return redirect('/users');
    }

}
