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
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Admin Login - Display Form
Route::get('/admin/login', [AdminController::class, 'loginForm']);
// Admin Login - Process Form
Route::post('/admin/login', [AdminController::class, 'login']);
// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'logout']);
