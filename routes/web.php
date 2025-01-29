<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetTimeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

Route::get('/auth/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/auth/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/auth/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/auth/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/auth/remember', [UserController::class, 'showRememberPassword'])->name('auth.remember_password');

Route::get('/auth/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index']);
Route::get('/api/boss', [HomeController::class, 'apiBoss']);


Route::middleware(['isMember'])->group(function () {

    Route::get('/set-time', [SetTimeController::class, 'setTime']);
    Route::get('/show-group', [GroupController::class, 'showGroup']);
    Route::post('/create-group', [GroupController::class, 'createGroup'])->name('create-group');
});