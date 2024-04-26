<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TicketController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/auth', [AuthController::class, 'ShowForm'])->name('auth');

Route::post('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/players', [PlayerController::class, 'index']);

Route::get('/search', [PlayerController::class, 'searchPlayers'])->name('search');


Route::get('/news/{id}', [NewsController::class, 'NewsDetails'])->name('news.details');
Route::get('/newspage', [NewsController::class, 'getNews']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'ProductDetails'])->name('product.details');

Route::get('/games', [GameController::class, 'index']);
Route::get('/game/{id}', [GameController::class, 'getGame']);

Route::get('/about', function () {
    return view('about');
});

Route::middleware('admin')->group(function () {
    Route::get('/gameslist', [GameController::class, 'getGames']);
    Route::post('/addgame', [GameController::class, 'addGame'])->name('addgame');
    Route::put('/updategame/{id}', [GameController::class, 'update'])->name('game.update');
    Route::delete('/deletegame/{id}', [GameController::class, 'delete'])->name('game.delete');

    Route::post('/addticket', [TicketController::class, 'CreateTickets'])->name('tickets.create');

    Route::get('/addproduct', [ProductController::class, 'Show']);
    Route::post('/addproduct', [ProductController::class, 'AddProduct'])->name('addproduct');
    Route::get('/productslist', [ProductController::class, 'getProducts']);

    Route::get('/allnews', [NewsController::class, 'getAllNews']);
    Route::post('/addnews', [NewsController::class, 'addNews'])->name('addnews');
    Route::put('/updatenews/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/deletenews/{id}', [NewsController::class, 'delete'])->name('news.delete');

    Route::get('/addstaff', [StaffController::class, 'Show']);
    Route::post('/addstaff', [StaffController::class, 'AddStaff'])->name('addstaff');
    Route::get('stafflist', [StaffController::class, 'getStaff'])->name('stafflist');
    Route::put('/updatestaff/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/deletestaff/{id}', [StaffController::class, 'delete'])->name('staff.delete');

    Route::get('/playerslist', [PlayerController::class, 'getPlayers'])->name('playerslist');
    Route::put('/updateplayer/{id}', [PlayerController::class, 'update'])->name('player.update');
    Route::delete('/deleteplayer/{id}', [PlayerController::class, 'delete'])->name('player.delete');
    Route::get('/addplayer', [PlayerController::class, 'Show']);
    Route::post('/addplayer', [PlayerController::class, 'AddPlayer'])->name('addplayer');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

});



Route::middleware('auth')->group(function () {
    Route::post('/buyproduct', [ProductController::class, 'BuyProducts'])->name('buyproduct');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/createreservation', [ReservationsController::class, 'createReservation'])->name('createReservation');

    Route::get('/myreservations/{id}', [ReservationsController::class, 'MyReservations'])->name('myreservations');

});
