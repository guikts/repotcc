<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TccController;
use App\Http\Controllers\BancaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tccs', TccController::class);
Route::resource('bancas', BancaController::class);