<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weblogs', [WeblogController::class, 'index'])->name('weblogs.index');
Route::get('/weblogs/create', [WeblogController::class, 'create'])->name('weblogs.create');
Route::post('/weblogs', [WeblogController::class, 'store'])->name('weblogs.store');
Route::get('/weblogs/{weblog}', [WeblogController::class, 'show'])->name('weblogs.show');
Route::delete('/weblogs/{weblog}', [WeblogController::class, 'destroy'])->name('weblogs.destroy');
Route::get('/weblogs/{weblog}/edit', [WeblogController::class, 'edit'])->name('weblogs.edit');
Route::put('weblogs/{weblog}', [WeblogController::class, 'update'])->name('weblogs.update');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::post('/weblogs/{weblog_id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::redirect('/', '/login');