<?php

namespace App\Http\Controllers\Admin;

class HomeController extends AdminController {
  public function index() {
    return view('admin.index', [
      'title' => 'Start',
      'links' => [
        'admin/users'    => 'Users',
        'admin/articles' => 'Articles',
      ],
    ]);
  }
}
