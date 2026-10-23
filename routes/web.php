<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/resep/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
