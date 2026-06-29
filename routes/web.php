<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'showRegister']);
Route::get('login', [AuthController::class, 'showLogin']);

Route::get('/',[HomeController::class, 'welcome']);
Route::get('/feed', [PostController::class, 'index']);
Route::post('/createPost', [PostController::class,'createPost']);
