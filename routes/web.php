<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use Illuminate\Support\Facades\Route;

// Start Page
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('admin')->group(function () {
  Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'show'])->name('login.show');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.login');
  });

  Route::middleware('admin')->group(function () {
    // General logout post route
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Start Page
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');

    /*
    * Users
    *
    */
    // List users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // Show user
    Route::get('users/{id}', [UserController::class, 'show'])
      ->where('id', '[0-9]+')->name('users.show');

    // Edit user
    Route::get('users/{id}/edit', [UserController::class, 'edit'])
      ->where('id', '[0-9]+')->name('users.edit');

    // Update user
    Route::patch('users/{id}', [UserController::class, 'update'])
      ->where('id', '[0-9]+')->name('users.update');

    // Create user
    Route::get('users/new', [UserController::class, 'create'])->name('users.create');

    // Store user
    Route::post('users', [UserController::class, 'store'])->name('users.store');

    // Remove/delete user
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    /*
    * Articles
    *
    */
    // List articles
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

    // Show article
    Route::get('articles/{id}', [ArticleController::class, 'show'])
      ->where('id', '[0-9]+')->name('articles.show');

    // Edit article
    Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
      ->where('id', '[0-9]+')->name('articles.edit');

    // Update article
    Route::put('articles/{id}', [ArticleController::class, 'update'])
      ->where('id', '[0-9]+')->name('articles.update');

    // Create article
    Route::get('articles/new', [ArticleController::class, 'create'])->name('articles.create');

    // Store article
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

    // Remove/delete article
    Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
  });
});

/**
 * Misc code
 */

// Route::get(
//   '/user/profile',
//   [UserProfileController::class, 'show']
// )->name('profile');

// // Generating URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');

// return to_route('profile');

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/greeting', function () {
//   return 'Hello World';
// });

// Route::view('/welcome', 'welcome');
