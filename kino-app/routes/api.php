<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/genders', [GenderController::class, 'index'])->name('genders.index');
Route::get('/films/{film_id}/reviews', [ReviewController::class, 'index'])->name('reviews.index');