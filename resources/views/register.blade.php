@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
        <h1>Register</h1>

        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg">Register</button>
        </form>
    </div>
@endsection
