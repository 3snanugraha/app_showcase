<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppShowcaseController;
use App\Http\Controllers\AppTesterController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [AppShowcaseController::class, 'index'])->name('home');
Route::get('/app/{id}', [AppShowcaseController::class, 'show'])->name('app.show');

// Tester Registration Route (Ajax)
Route::post('/register-tester', [AppTesterController::class, 'store'])->name('tester.store');

// Admin Authentication Routes
Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Protected Routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // App Management
    Route::resource('apps', AppShowcaseController::class)->except(['show']);
    
    // Tester Management
    Route::get('/testers', [AppTesterController::class, 'index'])->name('admin.testers.index');
    Route::post('/testers/{id}/send-invitation', [AppTesterController::class, 'sendInvitation'])->name('admin.testers.send-invitation');
    Route::delete('/testers/{id}', [AppTesterController::class, 'destroy'])->name('admin.testers.destroy');
});
