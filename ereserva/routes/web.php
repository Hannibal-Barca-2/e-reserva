<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\CitasController;
use Facade\IgnitionContracts\Solution;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas');
Route::get('/eventos', [App\Http\Controllers\EventosController::class, 'index'])->name('eventos');

Route::get('/register', [RegistroController::class, 'create'])->name('registro')
    ->middleware('guest');
Route::post('/register', [RegistroController::class, 'store'])->name('registro.store');

Route::get('/login', [SesionController::class, 'create'])->name('login')
    ->middleware('guest');
Route::post('/login', [SesionController::class, 'store'])->name('login.store');
Route::get('/logout', [SesionController::class, 'destroy'])->name('logout')
    ->middleware('auth');
Route::get('solicitudes/aceptar/{id}', [SolicitudesController::class, 'update'])->name('solicitudes.aceptar');
Route::get('solicitudes/rechazar/{id}', [SolicitudesController::class, 'destroy'])->name('solicitudes.rechazar');
Route::get('citas/eliminar/{id}', [CitasController::class, 'destroy'])->name('citas.eliminar');
Route::get('eventos/eliminar/{id}', [EventosController::class, 'destroy'])->name('eventos.eliminar');
Route::get('eventos/crear', [EventosController::class, 'create'])->name('eventos.crear');
// Route::get('/eventos/crear', [App\Http\Controllers\EventosController::class, 'create'])->name('crearevento');
