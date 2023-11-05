<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BalancesController;
use App\Http\Controllers\FlowsController;
use App\Http\Controllers\MonthsController;
use App\Http\Controllers\UsersController;
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


// Admin - Create
Route::get('/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/users/add', [UsersController::class, 'add'])->middleware('auth');
// Admin - Read
Route::get('/users/list', [UsersController::class, 'list'])->middleware('auth');
// Admin - Update
Route::get('/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
// Admin - Delete
Route::get('/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

// Dashboard/Homepage
Route::get('/', [AppController::class, 'home']);
Route::get('/home', [AppController::class, 'home']);
Route::get('/dashboard', [AppController::class, 'home']);

// Register - Display Form
Route::get('/register', [AppController::class, 'registerForm']);
// Register - Process Form
Route::post('/register', [AppController::class, 'register']);

// Login - Display Form
Route::get('/login', [AppController::class, 'loginForm'])->middleware('guest')->name('login');
// Login - Process Form
Route::post('/login', [AppController::class, 'login'])->middleware('guest');

// Logout
Route::get('/logout', [AppController::class, 'logout'])->middleware('auth');

// Create - Months
Route::get('/months/add', [MonthsController::class, 'addForm'])->middleware('auth');
Route::post('/months/add', [MonthsController::class, 'add'])->middleware('auth');
// Create - Balances
Route::get('/balances/add', [BalancesController::class, 'addForm'])->middleware('auth');
Route::post('/balances/add', [BalancesController::class, 'add'])->middleware('auth');
// Create - Flows
Route::get('/flows/add', [FlowsController::class, 'addForm'])->middleware('auth');
Route::post('/flows/add', [FlowsController::class, 'add'])->middleware('auth');

// Read - Months
Route::get('/months/list', [MonthsController::class, 'list'])->middleware('auth');
// Read - Balances
Route::get('/balances/list', [BalancesController::class, 'list'])->middleware('auth');
// Read - Flows
Route::get('/flows/list', [FlowsController::class, 'list'])->middleware('auth');

// Update - Months
Route::get('/months/edit/{month:id}', [MonthsController::class, 'editForm'])->where('month', '[0-9]+')->middleware('auth');
Route::post('/months/edit/{month:id}', [MonthsController::class, 'edit'])->where('month', '[0-9]+')->middleware('auth');
// Update - Balances
Route::get('/balances/edit/{balance:id}', [BalancesController::class, 'editForm'])->where('balance', '[0-9]+')->middleware('auth');
Route::post('/balances/edit/{balance:id}', [BalancesController::class, 'edit'])->where('balance', '[0-9]+')->middleware('auth');
// Update - Flows
Route::get('/flows/edit/{flow:id}', [FlowsController::class, 'editForm'])->where('flow', '[0-9]+')->middleware('auth');
Route::post('/flows/edit/{flow:id}', [FlowsController::class, 'edit'])->where('flow', '[0-9]+')->middleware('auth');

// Delete - Months
Route::get('/months/delete/{month:id}', [MonthsController::class, 'delete'])->where('month', '[0-9]+')->middleware('auth');
// Delete - Balances
Route::get('/balances/delete/{balance:id}', [BalancesController::class, 'delete'])->where('balance', '[0-9]+')->middleware('auth');
// Delete - Flows
Route::get('/flows/delete/{flow:id}', [FlowsController::class, 'delete'])->where('flow', '[0-9]+')->middleware('auth');
