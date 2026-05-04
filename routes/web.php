<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// PublicController
Route::get('/', [PublicController::class, 'index'])->name('home.index');

// ArticleController
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/create', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');