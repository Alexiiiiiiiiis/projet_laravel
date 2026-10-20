<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/home');
Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/apropos', [PagesController::class, 'apropos'])->name('apropos');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/show/{id}', [PagesController::class, 'show'])->name('show');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/saveproduct', [ProductController::class, 'saveproduct'])->name('products.save');
