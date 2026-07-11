<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',[HomeController::class, 'welcome']);
Route::get('home',[HomeController::class, 'welcome'])->name('home');
Route::get('feed', [PostController::class, 'index'])->name('feed')->middleware('auth');

Route::post('createPost', [PostController::class,'createPost'])->name('create.post')->middleware('auth');
Route::delete('deletepost/{id}',[PostController::class,'deletePost'])->name('delete.post')->middleware('auth');
Route::put('/posts/{id}', [PostController::class, 'editPost'])->name('posts.update')->middleware('auth');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('create.comment')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('likes.toggle')->middleware('auth');
Route::post('/users/{user}/follow', [NetworkController::class, 'follow'])->name('follow')->middleware('auth');
Route::post('/users/{user}/unfollow', [NetworkController::class, 'unfollow'])->name('unfollow')->middleware('auth');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/profile/image', [ProfileController::class, 'uploadImage'])->name('profile.image.upload')->middleware('auth');
