<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\MonthsController;
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
Route::get('/dashboard', [AppController::class, 'dashboard'])->middleware('auth');

// Login - Display Form
Route::get('/login', [AppController::class, 'loginForm'])->middleware('guest')->name('login');
// Login - Process Form
Route::post('/login', [AppController::class, 'login'])->middleware('guest');
// Logout
Route::get('/logout', [AppController::class, 'logout'])->middleware('auth');

// Read - months
Route::get('/months/list', [MonthsController::class, 'list'])->middleware('auth');

// Read - flows
Route::get('/flows/list', [FlowsController::class, 'list'])->middleware('auth');
