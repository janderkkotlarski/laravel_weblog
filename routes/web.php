<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');


Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::get('/articles/{article}/delete', [ArticleController::class, 'delete'])->name('articles.delete');
Route::get('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/user/login', [UserController::class, 'login'])->name('user.login');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview');	

	Route::get('auth/user', function() {
		$user = Auth::user();
	});
});

Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/articles');
