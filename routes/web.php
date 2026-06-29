<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);

Route::get('/', [PostController::class, 'index']);
Route::post('/createPost', [PostController::class,'createPost']);
