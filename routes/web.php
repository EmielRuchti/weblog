<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weblogs', [WeblogController::class, 'index'])->name('weblogs.index');
Route::get('/weblogs/create', [WeblogController::class, 'create'])->name('weblogs.create');
Route::post('/weblogs', [WeblogController::class, 'store'])->name('weblogs.store');
Route::get('/weblogs/{weblog}', [WeblogController::class, 'show'])->name('weblogs.show');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/login');