<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\IndexController;
use App\Http\Controllers\Recette\ShowRecetteController;
use App\Http\Controllers\Recette\ShowListRecetteController;
use App\Http\Controllers\Welcome\ShowRecetteController as WelcomeShowRecetteController;

Route::get('/', IndexController::class)-> name('index');
Route::get('/home', IndexController::class)-> name('index');

Route::get('recette/{recette:id}', WelcomeShowRecetteController::class)->name('recette');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('recettes', ShowListRecetteController::class)->name('recettes');
    Route::get('recette', ShowRecetteController::class);
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
