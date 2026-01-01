<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ServicePageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\GalleryPageController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\ArticlePageController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\AppointmentPageController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Admin\DashboardController;

// Frontend/Visitor Routes

Route::get('/', [HomeController::class, 'index'])->name('home');

// Services Frontend
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServicePageController::class, 'index'])->name('index');
});

// Products Frontend
Route::prefix('products')->name('products.')->group(function () {
    // Pastikan ini pakai controller untuk dynamic data
    Route::get('/', [ProductPageController::class, 'index'])->name('index');
});

// Articles Frontend
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticlePageController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticlePageController::class, 'show'])->name('show');
});

Route::get('/gallery', [GalleryPageController::class, 'index'])->name('gallery.index');

// Contact
Route::get('/contact', [ContactPageController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactPageController::class, 'store'])->name('contact.store');

// Appointments
Route::get('/appointments', [AppointmentPageController::class, 'index'])->name('appointments.index');
Route::post('/appointments', [AppointmentPageController::class, 'store'])->name('appointments.store');

// Newsletter
Route::post('/newsletter', [SubscriberController::class, 'store'])->name('newsletter.store');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Auth (Guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
        Route::get('/forgot-password', [PasswordResetController::class, 'request'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetController::class, 'email'])->name('password.email');
        Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
        Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
    });

    // Admin Area (Auth)
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Admin CRUD
        Route::resource('heroes', HeroController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('products', ProductController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('appointments', AppointmentController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);

        // Admin Contact Settings
        Route::resource('contact-settings', AdminContactController::class)->names('contact_settings');

        // Admin Inbox (Messages)
        Route::get('inbox', [ContactMessageController::class, 'index'])->name('inbox.index');
        Route::delete('inbox/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('inbox.destroy');
        Route::patch('inbox/{contactMessage}/read', [ContactMessageController::class, 'markAsRead'])->name('inbox.read');

        // Admin Newsletter Subscribers
        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
        Route::delete('subscribers/{subscriber}', [AdminSubscriberController::class, 'destroy'])->name('subscribers.destroy');
    });
});