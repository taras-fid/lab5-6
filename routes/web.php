<?php

use App\Http\Controllers\AboutController;
use \App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});

Route::get('/about', [AboutController::class,'about'])->name('about.host');

Route::get("/about/{table_num}", [AboutController::class,'about_active'])->name('about.active');

Route::get('/registration', [RegisterController::class,'registration'])->name('registration.host');

Route::post('/registration/check', [RegisterController::class,'registration_post']);

Route::get('/login', function () {
    return view('login');
})->name('login.host');

Route::post('/login/check', [\App\Http\Controllers\LoginController::class,'login_post']);

Route::get('/order', function () {
    return view('order');
});
