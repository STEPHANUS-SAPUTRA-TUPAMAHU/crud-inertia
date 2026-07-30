<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');


//Route untuk pengambilan data dari method index didalam controller UserController
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::resource('dosen', DosenController::class);


//Route untuk autentikasi pada saat masuk dashboard harus login terlebih dahulu
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
