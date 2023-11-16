@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <section class="p-3 m-5 border border-primary-subtle rounded-3">
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <div>
                    <label for="username">Username:</label>
                </div>
                <div>
                    <input type="text" name="username" id="username" placeholder="username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div>
                    <label for="password">Password:</label>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg">Register</button>
        </form>
    </section>
    
@endsection
