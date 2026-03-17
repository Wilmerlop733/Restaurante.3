<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menu');
});

Route::resource('/categorias','App\Http\Controllers\CategoriaController');
Route::resource('/ingredientes','App\Http\Controllers\IngredienteController');
Route::resource('/platos','App\Http\Controllers\PlatoController');
Route::resource('/recetas','App\Http\Controllers\RecetaController');
