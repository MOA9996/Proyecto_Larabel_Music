<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/albums/{albumId}/rating', [RatingController::class, 'store'])->name('ratings.store');Route::get('/index', [AlbumController::class, 'index'])->name('albums.index');

Route::get('/show{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/edit{id}', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/{album}/update', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/destroy{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');

// Ruta admin
Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->isAdmin()) {
        return 'Eres admin';
    }
    return redirect()->route('albums.index');
})->middleware('auth')->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
