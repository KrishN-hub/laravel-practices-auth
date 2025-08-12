<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('auth.registration');
