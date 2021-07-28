<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create']);
    Route::post('register', [RegistrationController::class, 'store']);
    Route::get('login', [SessionController::class, 'create']);
});

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('login', [SessionController::class, 'store']);

Route::middleware('admin')->group(function () {
    Route::get('admin/posts/create', [PostController::class, 'create']);
    Route::post('admin/posts', [PostController::class, 'store']);
});
