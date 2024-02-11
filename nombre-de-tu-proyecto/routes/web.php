<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

