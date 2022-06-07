<?php

use App\Http\Controllers\AboutController;
use \App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});

Route::get('/about', [AboutController::class,'about']);

Route::get('/registration', [RegisterController::class,'registration']);

Route::post('/registration/check', [RegisterController::class,'registration_post']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/order', function () {
    return view('order');
});
