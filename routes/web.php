<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/profile', [PublicController::class, 'profile'])->name('profile');

Route::get('/product', [PublicController::class, 'product'])->name('product');

Route::get('/product/{id}', [PublicController::class, 'detail'])->name('product.detail');

Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery'); 

Route::get('/article', [PublicController::class, 'article'])->name('article'); 

Route::get('/contact', [PublicController::class, 'contact'])->name('contact'); 

Route::post('/contact', [PublicController::class, 'submitContact'])->name('contact.store');

Route::middleware('guest:web')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [SubscriptionController::class, 'dashboard'])->name('dashboard');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});