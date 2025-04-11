<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
  public function index() {
    $links = $this->linksHome;
    $breadcrumbs = $this->breadcrumbs;
    return view('index', compact('links', 'breadcrumbs'));
  }
}
