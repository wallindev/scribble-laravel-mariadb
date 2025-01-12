<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
  public function index() {
    $links = ['admin' => 'Admin'];
    return view('index', ['links' => $links]);
    // return view('index', [
    //   'links' => [
    //     'admin' => 'Admin'
    //   ]
    // ]);
  }
}
