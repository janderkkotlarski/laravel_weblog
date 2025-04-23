<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OverviewController;

Route::get('/overview', [OverviewController::class, 'index'])->name('overview');

Route::redirect('/', '/overview');