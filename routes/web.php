<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create']);
    Route::post('register', [RegistrationController::class, 'store']);
    Route::get('login', [SessionController::class, 'create']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionController::class, 'destroy']);
});

Route::post('login', [SessionController::class, 'store']);
