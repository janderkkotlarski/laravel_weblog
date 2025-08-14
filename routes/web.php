<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth');
Route::get('/articles/{article}/delete', [ArticleController::class, 'delete'])->name('articles.delete')->middleware('auth');
Route::get('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.overview')->middleware('auth');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');

Route::get('/user/login', [AuthenticationController::class, 'login'])->name('user.login');
Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview')->middleware('auth');
Route::get('/user/premium', [UserController::class, 'show'])->name('user.premium')->middleware('auth');

Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth');

Route::post('/logout', [AuthenticationController::class, 'logout']);
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store')->middleware('auth');
Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');

Route::redirect('/', '/articles');