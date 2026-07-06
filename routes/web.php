<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',[HomeController::class, 'welcome']);
Route::get('home',[HomeController::class, 'welcome'])->name('home');
Route::get('feed', [PostController::class, 'index'])->name('feed');
Route::post('createPost', [PostController::class,'createPost'])->name('create.post');
Route::delete('deletepost/{id}',[PostController::class,'deletePost'])->name('delete.post');
Route::put('/posts/{id}', [PostController::class, 'editPost'])->name('posts.update');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('create.comment');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('likes.toggle');
