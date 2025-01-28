<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetTimeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

Route::get('/login', [UserController::class, 'showLogin']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/api/boss', [HomeController::class, 'apiBoss']);



Route::get('/set-time', [SetTimeController::class, 'setTime']);
Route::get('/show-group', [GroupController::class, 'showGroup']);
Route::post('/create-group', [GroupController::class, 'createGroup'])->name('create-group');
Route::get('/create-group', [GroupController::class, 'createGroup']);
