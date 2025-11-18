<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('credentials.signup');
})->name('signup');

Route::get('/login', function () {
    return view('credentials.login');
})->name('login');
