<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas');
Route::resource('/eventos', EventosController::class);

Route::get('/register', [RegistroController::class, 'create'])->name('registro')
    ->middleware('guest');
Route::post('/register', [RegistroController::class, 'store'])->name('registro.store');

Route::get('/login', [SesionController::class, 'create'])->name('login')
    ->middleware('guest');
Route::post('/login', [SesionController::class, 'store'])->name('login.store');
Route::get('/logout', [SesionController::class, 'destroy'])->name('logout')
    ->middleware('auth');
// Route::get('/eventos/crear', [App\Http\Controllers\EventosController::class, 'create'])->name('crearevento');

