<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Task Management Routes
Route::prefix('/products')->group(function () {
    Route::get('/', [ProductController::class, "index"])->name('products');
    Route::post('/store', [ProductController::class, "store"])->name('products.store');
    Route::get('/{task_id}/delete', [ProductController::class, "delete"])->name('products.delete');
    Route::get('/edit', [ProductController::class, "edit"])->name('products.edit');
    Route::post('/{task_id}/update', [ProductController::class, "update"])->name('products.update');
});
