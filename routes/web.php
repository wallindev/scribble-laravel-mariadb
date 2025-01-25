<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Start Page
Route::get('/', [HomeController::class, 'index']);

// Admin Start Page
Route::get('/admin', [Admin\HomeController::class, 'index']);

// List users
Route::get('/admin/users', [Admin\UserController::class, 'index'])->name('users.index');

// Show user
Route::get('/admin/users/{id}', [Admin\UserController::class, 'show'])->name('users.show');

// Edit user
Route::get('/admin/users/{id}/edit', [Admin\UserController::class, 'edit'])->name('users.edit');

// Update user
Route::patch('/admin/users/{id}', [Admin\UserController::class, 'update'])->name('users.update');

// Remove/delete user
Route::delete('/admin/users/{id}', [Admin\UserController::class, 'destroy'])->name('users.destroy');

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
