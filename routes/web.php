<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PembayaranController;

Route::get('/', [RecipeController::class, 'index'])->name('home');
Route::get('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{name}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/checkout/{id}', [PackageController::class, 'checkout'])->name('packages.checkout');
Route::post('/checkout/process/{id}', [PackageController::class, 'process'])->name('packages.process');
Route::get('/payment/success', [PackageController::class, 'success'])->name('payment.success');
Route::post('/pembayaran', [PembayaranController::class, 'store']);

