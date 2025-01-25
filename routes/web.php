<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Start Page
Route::get('/', [HomeController::class, 'index']);

// Admin Start Page
Route::get('/admin', [Admin\HomeController::class, 'index']);

// List users
Route::get('/admin/users', [Admin\UserController::class, 'index']);

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
