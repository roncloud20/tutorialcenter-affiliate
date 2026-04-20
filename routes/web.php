<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.store');

    Route::get('/verify-account', function () {
        return view('auth.verify-account');
    })->name('verification.notice');

    Route::post('/verify-account', [UserController::class, 'verifyToken'])
        ->name('verification.token.verify');

    Route::post('/resend-verification', [UserController::class, 'resendVerification'])
        ->name('verification.resend');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [UserController::class, 'logoutUser'])->name('logout');
});