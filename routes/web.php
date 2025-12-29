<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;

/*
|--------------------------------------------------------------------------
| Visitor Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::prefix('services')->name('services.')->group(function () {
    Route::view('/', 'pages.services.index')->name('index');
    Route::view('/{slug}', 'pages.services.show')->name('show');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::view('/', 'pages.products.index')->name('index');
    Route::view('/{slug}', 'pages.products.show')->name('show');
});

Route::prefix('articles')->name('articles.')->group(function () {
    Route::view('/', 'pages.articles.index')->name('index');
    Route::view('/{slug}', 'pages.articles.show')->name('show');
});

Route::view('/gallery', 'pages.gallery.index')->name('gallery.index');
Route::view('/contact', 'pages.contact.index')->name('contact.index');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |-------------------------
    | Admin Auth (Guest)
    |-------------------------
    */
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');

    Route::get('/forgot-password', [PasswordResetController::class, 'request'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'email'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])
        ->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'update'])
        ->name('password.update');

    Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


    /*
    |-------------------------
    | Admin Area (Auth)
    |-------------------------
    */
    Route::middleware('auth')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::view('/', 'admin.dashboard')
            ->name('dashboard');

        Route::prefix('services')->name('services.')->group(function () {
            Route::view('/', 'admin.services.index')->name('index');
        });

        Route::prefix('products')->name('products.')->group(function () {
            Route::view('/', 'admin.products.index')->name('index');
        });

        Route::prefix('articles')->name('articles.')->group(function () {
            Route::view('/', 'admin.articles.index')->name('index');
        });

        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::view('/', 'admin.gallery.index')->name('index');
        });

        Route::prefix('appointments')->name('appointments.')->group(function () {
            Route::view('/', 'admin.appointments.index')->name('index');
        });
    });

    
});
