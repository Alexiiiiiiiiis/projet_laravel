<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/apropos', [PagesController::class, 'apropos'])->name('apropos');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/show/{id}', [PagesController::class, 'show'])->name('show');
