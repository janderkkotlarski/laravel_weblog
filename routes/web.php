<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;



Route::get('/articles', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/articles');