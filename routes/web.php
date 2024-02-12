<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\HomeController;

//Rutas HomeController
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'showHome'])->name('home');

//Rutas LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-autenticar', [LoginController::class, 'autenticarUsuario'])->name('login-autenticar');

//Rutas RegistroController
Route::get('/registro-usuario', [RegistroController::class, 'showRegistro'])->name('registro-usuario');
Route::post('/registro-realizar', [RegistroController::class, 'registrarusuario'])->name('registro-realizar');