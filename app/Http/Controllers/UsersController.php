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
        ]);

        ddd('Add User');
    }
}
