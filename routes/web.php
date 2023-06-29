<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

//admin
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;


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

Route::get('/',[IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slag}',[IndexController::class, 'category'])->name('category');
Route::get('/quoc-gia/{slag}',[IndexController::class, 'country'])->name('country');
Route::get('/the-loai/{slag}',[IndexController::class, 'genre'])->name('genre');
Route::get('/phim',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim',[IndexController::class, 'watch'])->name('watch');
Route::get('/tap-phim',[IndexController::class, 'episode'])->name('episode');






Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting');


Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('movie',MovieController::class, );

