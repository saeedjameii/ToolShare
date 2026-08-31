<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/sign-up', [AuthController::class, 'signUpPost'])->name('signUp.post');

Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/create', function(){
    return view('tools.create');
})->name('create.post')->middleware('auth');