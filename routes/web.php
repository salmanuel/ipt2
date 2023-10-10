<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HeroController;
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

Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm');
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::post('/dashboard', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('heroes', HeroController::class);

// Route::get('/sendmail', [EmailController::class, 'sendEmail']);

