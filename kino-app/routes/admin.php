<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryFilmController;
use App\Http\Controllers\Admin\ReviewFilmController;
use App\Http\Controllers\Admin\RatingFilmController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login_form', [AuthController::class, 'login'])->name('login_form');

Route::middleware(['auth:admin'])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/countries', [CountryController::class, 'countries'])->name('countries');
    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
    Route::get('/films', [FilmController::class, 'films'])->name('films');
    Route::get('/categoryfilms', [CategoryFilmController::class, 'categoryfilms'])->name('categoryfilms');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/reviews', [ReviewFilmController::class, 'reviews'])->name('reviews');
    Route::get('/ratings', [RatingFilmController::class, 'ratings'])->name('ratings');

    Route::resource('/countries', CountryController::class)->except(['show']);
    Route::resource('/categories', CategoryController::class)->except(['show']);
    Route::resource('/films', FilmController::class)->except(['show']);
    Route::resource('/categoryfilms', CategoryFilmController::class)->except(['show']);
    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/reviews', ReviewFilmController::class)->except(['show']);
    Route::resource('/ratings', RatingFilmController::class)->except(['show']);
});