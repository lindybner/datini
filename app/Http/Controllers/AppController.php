<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    // Return Homepage view
    public function home()
    {
        return view('home');
    }

    // Show registration form
    public function registerForm()
    {
        return view('register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Automatically log in the user after registration
        auth()->attempt($request->only('username', 'password'));

        return redirect('/dashboard');
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
