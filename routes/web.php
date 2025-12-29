<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/contacts', 'pages.contact.index')->name('contact.index');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login.submit');

    Route::view('/', 'admin.dashboard')->name('dashboard');

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
