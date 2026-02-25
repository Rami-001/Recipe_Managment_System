<?php

use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('Layout');
});

Route::resource('recipes', RecipeController::class);

