<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorksController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::get('/works', [WorksController::class, 'show'])->name('works.show');