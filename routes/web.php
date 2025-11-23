<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MakePostController;
use App\Http\Controllers\ArticulosController;

Route::get('/', function () {
    return view('home');
})->name('home');


// Rutas de autenticación
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Ruta inicio
Route::middleware('auth')->group(function () {

Route::get('/dashboard', [ArticulosController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
});

// Ruta del dashboard (protegida)
Route::get('/profile', function () {
    $posts = Articulo::with('autor')
        ->where('autor_id', auth()->id())
        ->orderBy('fecha_publicacion', 'desc')
        ->get();

    return view('app.user', compact('posts'));
})->middleware('auth')->name('profile');
Route::middleware('auth')->group(function () {

    Route::get('/articulos/crear', [MakePostController::class, 'showForm'])
        ->name('articulos.create');

    Route::post('/articulos', [MakePostController::class, 'store'])
        ->name('articulos.store');

});
