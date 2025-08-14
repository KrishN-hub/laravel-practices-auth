<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('postRegistration');

//route for dashboard
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Route for logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//middleware group
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
    
