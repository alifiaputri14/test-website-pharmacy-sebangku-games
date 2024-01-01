<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductHistoryController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/users', [AuthController::class, 'store']);
Route::get('/registrasi', [AuthController::class, 'create']);

// Routes accessible by admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/produk', [ProductController::class, 'index']);
    Route::get('/produk/tambah', [ProductController::class, 'create']);
    Route::post('/produk', [ProductController::class, 'store']);
    Route::get('/produk/edit/{id}', [ProductController::class, 'edit']);
    Route::patch('/produk/{id}', [ProductController::class, 'update']);
    Route::delete('/produk/delete/{id}', [ProductController::class, 'destroy'])->name('produk.delete');
    Route::get('/product-history/restore', [ProductHistoryController::class, 'index']);
    Route::post('/product-history/restore/{id}', [ProductHistoryController::class, 'restore'])->name('product_history.restore');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/approve', [UserController::class, 'approveRegistration'])->name('users.approve');
});

// Routes accessible by customer
Route::middleware(['auth', 'customer'])->group(function () {
    // Customer-only routes
    Route::get('/home', [HomeController::class, 'index']);
});
