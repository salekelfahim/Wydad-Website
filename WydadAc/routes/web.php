<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StaffController;
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
    return view('accueil');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/auth', [AuthController::class, 'ShowForm'])->name('auth');

Route::post('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/addplayer', [PlayerController::class, 'Show']);
Route::post('/addplayer', [PlayerController::class, 'AddPlayer'])->name('addplayer');

Route::get('/playerslist', [PlayerController::class, 'getPlayers'])->name('playerslist');

Route::put('/updateplayer/{id}', [PlayerController::class, 'update'])->name('player.update');

Route::get('/addstaff', [StaffController::class, 'Show']);
Route::post('/addstaff', [StaffController::class, 'AddStaff'])->name('addstaff');

Route::get('stafflist', [StaffController::class, 'getStaff'])->name('stafflist');