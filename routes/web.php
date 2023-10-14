<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Overview
Route::get('/overview', [AppController::class, 'overview'])->middleware('auth');

// Login - Display Form
Route::get('/login', [AppController::class, 'loginForm'])->middleware('guest')->name('login');
// Login - Process Form
Route::post('/login', [AppController::class, 'login'])->middleware('guest');
// Logout
Route::get('/logout', [AppController::class, 'logout'])->middleware('auth');
