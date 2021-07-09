<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//['register'=>false] inside Auth
Auth::routes();


Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('food', FoodController::class)->middleware('auth');

Route::get('/', [MenuController::class, 'menu'] );
Route::get('/foods/{id}', [MenuController::class, 'menu_show'])->name('menu.menu_show');


Route::get('/about', [MenuController::class, 'about'] );
Route::get('/contact', [MenuController::class, 'contact'] );
Route::get('/privacy', [MenuController::class, 'privacy'] );
Route::get('/terms', [MenuController::class, 'terms'] );