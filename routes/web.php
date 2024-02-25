<?php

use App\Http\Controllers\ArticelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articels/{slug}/', [ArticelController::class, 'detail'])->name('articels.detail');
Route::get('/articels', [ArticelController::class, 'index'])->name('articels.index');
Route::get('/galleries', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/profiles/{slug}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/counter', Counter::class);
Route::get('/coming-soon', function () {
    return view('comingsoon.index');
})->name('comingsoon');
