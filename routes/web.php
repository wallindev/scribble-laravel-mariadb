<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Start Page
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Admin Start Page
Route::get('/admin', [Admin\HomeController::class, 'index'])->name('admin.index');

/*
 * Users
 *
 */
// List users
Route::get('/admin/users', [Admin\UserController::class, 'index'])->name('users.index');

// Show user
Route::get('/admin/users/{id}', [Admin\UserController::class, 'show'])
  ->where('id', '[0-9]+')->name('users.show');

// Edit user
Route::get('/admin/users/{id}/edit', [Admin\UserController::class, 'edit'])
->where('id', '[0-9]+')->name('users.edit');

// Update user
Route::patch('/admin/users/{id}', [Admin\UserController::class, 'update'])
->where('id', '[0-9]+')->name('users.update');

// Create user
Route::get('/admin/users/new', [Admin\UserController::class, 'create'])->name('users.create');

// Store user
Route::post('/admin/users', [Admin\UserController::class, 'store'])->name('users.store');

// Remove/delete user
Route::delete('/admin/users/{id}', [Admin\UserController::class, 'destroy'])->name('users.destroy');

/*
 * Articles
 *
 */
// List articles
Route::get('/admin/articles', [Admin\ArticleController::class, 'index'])->name('articles.index');

// Show article
Route::get('/admin/articles/{id}', [Admin\ArticleController::class, 'show'])
  ->where('id', '[0-9]+')->name('articles.show');

// Edit article
Route::get('/admin/articles/{id}/edit', [Admin\ArticleController::class, 'edit'])
->where('id', '[0-9]+')->name('articles.edit');

// Update article
Route::put('/admin/articles/{id}', [Admin\ArticleController::class, 'update'])
->where('id', '[0-9]+')->name('articles.update');

// Create article
Route::get('/admin/articles/new', [Admin\ArticleController::class, 'create'])->name('articles.create');

// Store article
Route::post('/admin/articles', [Admin\ArticleController::class, 'store'])->name('articles.store');

// Remove/delete article
Route::delete('/admin/articles/{id}', [Admin\ArticleController::class, 'destroy'])->name('articles.destroy');

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

Route::get('/greeting', function () {
  return 'Hello World';
});

Route::view('/welcome', 'welcome');
