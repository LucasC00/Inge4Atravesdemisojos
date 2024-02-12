<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\LoginController;
use app\Http\Controllers\HomeController;

Route::get('/', 'app\Http\Controllers\HomeController@index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

