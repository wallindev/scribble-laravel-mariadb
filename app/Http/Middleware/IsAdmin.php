<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin {
  public function handle(Request $request, Closure $next) {
    if (!(auth('admin')->check() && auth('admin')->user()->is_admin)) {
      return redirect()->route('login.show')->with('error', 'Administrator privileges required.');
    }
    return $next($request);
  }
}
