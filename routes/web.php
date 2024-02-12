<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RespuestasController;


// Rutas HomeController
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'showHome'])->name('home');

// Rutas LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-autenticar', [LoginController::class, 'autenticarUsuario'])->name('login-autenticar');

// Rutas RegistroController
Route::get('/registro-usuario', [RegistroController::class, 'showRegistro'])->name('registro-usuario');
Route::post('/registro-realizar', [RegistroController::class, 'registrarUsuario'])->name('registro-realizar');

// Rutas - RecursosController
Route::get('/recursos-externos', [RecursosController::class, 'mostrarRecursosExternos'])->name('recursos-externos');

// Rutas - ConfiguracionController
Route::get('/configuracion-usuario', [ConfiguracionController::class, 'showConfiguracion'])->name('configuracion-usuario');
Route::post('/configuracion-realizar', [ConfiguracionController::class, 'configurarUsuario'])->name('configuracion-realizar');

Route::get('/preguntas', [PreguntasController::class, 'index']);
Route::get('/preguntas/{id_pregunta}/respuestas', [RespuestasController::class, 'index']);
