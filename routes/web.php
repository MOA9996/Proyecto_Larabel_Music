<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return redirect('/albums');
});

Route::resource('albums', AlbumController::class);

Route::get('/index', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/create', [AlbumController::class, 'create'])->name('albums.create');
Route::get('/show{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/edit{id}', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/{album}/update', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/destroy{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');
