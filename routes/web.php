<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use Illuminate\Support\Facades\Route;

// Start/Root Page, this is going to serve the React SPA (this is public, no restrictions)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Everything from "/admin" path and beyond
Route::prefix('admin')->group(function () {
  // Unauthenticated users ("guests" in the "admin" guard) have access
  Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
  });

  // Authenticated users that are NOT admin have access ("users" in the "admin" guard with is_admin=false)
  Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
  });

  // Authenticated users that ARE admin have access ("users" in the "admin" guard with is_admin=true)
  Route::middleware(['auth:admin', 'admin'])->group(function () {
    // Admin Start Page
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');

    /*
    * Users
    */
    // List users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // Show user
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

    // Edit user
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Update user
    Route::patch('users/{id}', [UserController::class, 'update'])->name('users.update');

    // Create user
    Route::get('users/new', [UserController::class, 'create'])->name('users.create');

    // Store user
    Route::post('users', [UserController::class, 'store'])->name('users.store');

    // Remove/delete user
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    /*
    * Articles
    */
    // List articles
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

    // Show article
    Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

    // Edit article
    Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

    // Update article
    Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

    // Create article
    Route::get('articles/new', [ArticleController::class, 'create'])->name('articles.create');

    // Store article
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

    // Remove/delete article
    Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
  });

  // Catch-all for admin, to avoid "HTTP 404 Not Found" generic error page
  Route::any('{any}', function () {
    return redirect()->route('admin.index')->withErrors(['error' => 'Page does not exist.']);
  })->where('any', '.*');
});

// Catch-all for root, to avoid "HTTP 404 Not Found" generic error page
Route::any('{any}', function () {
  return redirect()->route('home.index')->withErrors(['error' => 'Page does not exist.']);
})->where('any', '.*');
