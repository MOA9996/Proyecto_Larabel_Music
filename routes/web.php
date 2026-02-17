<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return redirect('/albums');
});

Route::resource('albums', AlbumController::class);
