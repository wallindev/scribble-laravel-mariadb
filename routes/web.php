<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', [Admin\HomeController::class, 'index']);

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
