<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BalancesController;
use App\Http\Controllers\FlowsController;
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

// Read - balances
Route::get('/balances/list', [BalancesController::class, 'list'])->middleware('auth');

// Delete - months
Route::get('/months/delete/{month:id}', [MonthsController::class, 'delete'])->where('month', '[0-9]+')->middleware('auth');

// Delete - flows
Route::get('/flows/delete/{flow:id}', [FlowsController::class, 'delete'])->where('flow', '[0-9]+')->middleware('auth');

// Delete - months
Route::get('/balances/delete/{balance:id}', [BalancesController::class, 'delete'])->where('balance', '[0-9]+')->middleware('auth');
