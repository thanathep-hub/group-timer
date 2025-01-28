<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetTimeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

Route::get('/auth/login', [UserController::class, 'showLogin'])->name('auth.login');

Route::get('/auth/register', [UserController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
Route::get('/auth/remember', [UserController::class, 'showRememberPassword'])->name('auth.remember_password');


Route::get('/', [HomeController::class, 'index']);
Route::get('/api/boss', [HomeController::class, 'apiBoss']);



Route::get('/set-time', [SetTimeController::class, 'setTime']);
Route::get('/show-group', [GroupController::class, 'showGroup']);
Route::post('/create-group', [GroupController::class, 'createGroup'])->name('create-group');
Route::get('/create-group', [GroupController::class, 'createGroup']);
