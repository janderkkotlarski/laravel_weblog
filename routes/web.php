<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get('/overview', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/create', [ArticleController::class, 'store'])->name('articles.store');

Route::redirect('/', '/overview');