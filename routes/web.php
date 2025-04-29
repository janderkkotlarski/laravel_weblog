<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');

Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/articles');