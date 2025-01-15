<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', function () {
    $articles = Article::all();
    return response()->json($articles);
});

Route::get('/users', function () {
    $users = User::all();
    return response()->json($users);
});
