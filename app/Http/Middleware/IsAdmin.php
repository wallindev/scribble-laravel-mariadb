<?php

namespace App\Http\Middleware;

class IsAdmin {
  public function handle() {
    if (!(auth('admin')->check() && auth('admin')->user()->is_admin)) {
      return redirect()->route('login.show')->with('error', 'Administrator privileges required.');
    }
  }
}
