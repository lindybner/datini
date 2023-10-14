<?php

use App\Http\Controllers\ConsoleController;
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

// Dashboard
Route::get('/console/overview', [ConsoleController::class, 'overview'])->middleware('auth');

// Login - Display Form
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
// Login - Process Form
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
// Logout
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
