<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('subscribe', SubscriptionController::class);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store'])->name('register');
    Route::get('login', [SessionsController::class, 'create']);
    Route::post('login', [SessionsController::class, 'store'])->name('login');
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::controller(AdminPostController::class)->group(function () {

            Route::get('/posts', 'index')->name('dashboard');
            Route::get('/posts/create', 'create');
            Route::post('/posts/store', 'store');
            Route::get('/posts/{post}/edit', 'edit');
            Route::patch('/posts/{post}', 'update');
            Route::delete('/posts/{post}', 'destroy');

        });

    });
});

