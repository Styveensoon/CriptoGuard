<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MakePostController;

Route::get('/', function () {
    return view('home');
})->name('home');


// Rutas de autenticación
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta del dashboard (protegida)
Route::get('/dashboard', function () {
    return view('app.init');
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/articulos/crear', [MakePostController::class, 'showForm'])
        ->name('articulos.create');

    Route::post('/articulos', [MakePostController::class, 'store'])
        ->name('articulos.store');

});