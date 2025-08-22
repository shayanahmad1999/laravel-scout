<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('movies.create');
});

Route::resource('movies', MovieController::class);
