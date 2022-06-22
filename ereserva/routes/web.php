<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas');
Route::resource('/eventos', EventosController::class);
// Route::get('/eventos/crear', [App\Http\Controllers\EventosController::class, 'create'])->name('crearevento');

