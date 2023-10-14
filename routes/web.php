<?php

use App\Http\Controllers\AdminController;
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

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');

// Admin Login - Display Form
Route::get('/admin/login', [AdminController::class, 'loginForm'])->middleware('guest');
// Admin Login - Process Form
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('guest');
// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware('auth');
