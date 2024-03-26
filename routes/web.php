<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/{param}', [LinkController::class, 'redirectTo']);

Route::middleware('auth')->group(function () {
    Route::get('/user/home', [LinkController::class, 'index'])->name('home');
    Route::post('/link/store', [LinkController::class, 'store'])->name('link.store');
    Route::get('/link/{id}/delete', [LinkController::class, 'delete'])->name('link.delete');
    Route::get('/link/{id}/edit', [LinkController::class, 'showEditModal'])->name('link.modal.edit');
    Route::put('/link/{id}/edit', [LinkController::class, 'edit'])->name('link.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
