<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/sign-up', [AuthController::class, 'signUpPost'])->name('signUp.post');

Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/create', [PostController::class, 'create'])->name('create_post')->middleware('auth');
Route::post('/create', [PostController::class, 'createPost'])->name('create.post');