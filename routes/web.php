<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RecetaController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registro', [AuthController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register']);
Route::get('/recuperar', [AuthController::class, 'showForgotPasswordForm'])->name('recuperar');
Route::post('/recuperar', [AuthController::class, 'resetPassword']);

Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('menu');
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/categoria', CategoriaController::class);
    Route::resource('/ingrediente', IngredienteController::class);
    Route::resource('/plato', PlatoController::class);
    Route::resource('/receta', RecetaController::class);

    Route::get('/plato/filtro/{id}', [PlatoController::class, 'verplatos']);
    Route::get('/receta/filtro/{id}', [RecetaController::class, 'verreceta']);
});
