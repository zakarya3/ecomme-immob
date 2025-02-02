<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DecoratorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DecoratorController::class,'index'])->name('inex');
Route::get('/search', [DecoratorController::class, 'searchByName'])->name('search');
Route::get('/category', [DecoratorController::class, 'searchByCategory'])->name('category');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/decorator/create', [DashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.decorator.create');
Route::post('/dashboard/decorator', [DashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.decorator.store');
Route::get('/dashboard/decorator/{id}/edit', [DashboardController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.decorator.edit');
Route::put('/dashboard/decorator/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.decorator.update');
Route::delete('/dashboard/decorator/{id}', [DashboardController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.decorator.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
