<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.overview');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview');

	Route::get('auth/user', function() {
		$user = Auth::user();
	});
});

Route::get('/user/login', [UserController::class, 'login'])->name('user.login');

Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/articles');