<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get('/overview', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/create', [ArticleController::class, 'store'])->name('articles.store');

Route::redirect('/', '/overview');