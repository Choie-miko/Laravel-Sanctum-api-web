<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\Web\WebPostController;
use App\Http\Controllers\Web\WebCommentController;

// Root route redirection
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
Route::get('register', [WebAuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [WebAuthController::class, 'register']);
Route::get('login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [WebAuthController::class, 'login']);
Route::post('logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [WebPostController::class, 'index'])->name('dashboard');
    Route::resource('posts', WebPostController::class); // Using resourceful route for posts

    // Comments routes
    Route::get('/dashboard/comments', [WebCommentController::class, 'index'])->name('comments.index');
    Route::post('/dashboard/comments', [WebCommentController::class, 'store'])->name('comments.store');
});
