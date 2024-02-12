<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

