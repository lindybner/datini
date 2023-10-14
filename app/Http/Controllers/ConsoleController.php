<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    // Return Overview view
    public function overview()
    {
        return view('console.overview');
    }

    // Return Login Form view
    public function loginForm()
    {
        return view('console.login');
    }

    // Process login form on submission
    public function login()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/console/overview');
        }

        return back()
            ->withInput()
            ->withErrors(['username' => 'Invalid login credentials']);
    }

    // Logout
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
