<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;

class ArticleController extends AdminController {
  public function index() {
    $articles = Article::all();
    return view('admin.articles.index', [
      'title'    => 'Articles',
      'articles' => $articles,
    ]);
    // return view('admin.articles.index', compact('articles'));
  }

  public function show($id) {
    $article = Article::findOrFail($id);
    return view('admin.articles.show', [
      'title'   => 'Show Article',
      'article' => $article,
    ]);
  }

  public function edit($id) {
    $article = Article::findOrFail($id);
    return view('admin.articles.edit', [
      'title'   => 'Edit Article',
      'article' => $article,
    ]);
  }
}
