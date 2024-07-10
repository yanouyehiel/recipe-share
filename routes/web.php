<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\IndexController;
use App\Http\Controllers\Recette\Links\ShowController;
use App\Http\Controllers\Recette\Links\TemplateController;
use App\Http\Controllers\Recette\ShowRecetteController;
use App\Http\Controllers\Recette\ShowListRecetteController;
use App\Http\Controllers\Welcome\ShowRecetteController as WelcomeShowRecetteController;

Route::get('/', IndexController::class)-> name('index');
Route::get('/home', IndexController::class)-> name('index');

Route::get('show/{recette:id}', WelcomeShowRecetteController::class)->name('show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('recettes', ShowListRecetteController::class)->name('recettes');
    Route::get('recette/{recette:id}', ShowRecetteController::class)->name('recette');
    Route::get('links', ShowController::class)->name('links');
    Route::get('links/{link:token}', TemplateController::class)->name('template');
});

Route::get('recette/{recette:id}', [ShowRecetteController::class, 'recette'])->name('recette');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
