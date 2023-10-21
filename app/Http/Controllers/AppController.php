<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    // Return Dashboard view
    public function dashboard()
    {
        return view('dashboard');
    }

    // Return Login Form view
    public function loginForm()
    {
        return view('login');
    }

    // Process login form on submission
    public function login()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/dashboard');
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
