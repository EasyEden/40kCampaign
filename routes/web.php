<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/', [\App\Http\Controllers\gridController::class, 'drawGrid'] );

Route::post('/login', [\App\Http\Controllers\authController::class, 'login'] )->name('login');

Route::post('/register', [\App\Http\Controllers\authController::class, 'register'] )->name('register');

