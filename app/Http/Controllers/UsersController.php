<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function list()
    {
        return view('users.list', [
            'users' => User::all()
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/users/list')
            ->with('message', 'User has been deleted.');
    }

    public function addForm()
    {
        return view('users.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'nullable|boolean',
        ]);

        $user = new User();
        $user->username = $attributes['username'];
        $user->password = $attributes['password'];
        $user->is_admin = $attributes['is_admin'] ?? false; // Set is_admin to false if not provided
        $user->save();

        return redirect('/users/list')
            ->with('message', 'New user created.');
    }

    public function editForm(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'nullable|boolean', // Validation for is_admin attribute
        ]);

        $user->username = $attributes['username'];
        $user->password = $attributes['password'];
        $user->is_admin = $attributes['is_admin'] ?? false; // Set is_admin to false if not provided
        $user->save();

        return redirect('/users/list')
            ->with('message', 'User edited.');
    }
}
