<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TolabController;
use Illuminate\Support\Facades\Route;

Route::post('register', [TolabController::class , 'store'] ) ;

Route::post('login', [LoginController::class , 'Login'] ) ;
Route::post('logout', [LoginController::class , 'Logout'] ) ;
