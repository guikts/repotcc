<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TccController;
use App\Http\Controllers\BancaController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('clientes', TccController::class);
Route::resource('vendas', BancaController::class);
