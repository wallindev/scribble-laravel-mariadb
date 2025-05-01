<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin {
  public function handle(Request $request, Closure $next): Response {
    // Exclude the login POST request (that has its own auth logic)
    // if ($request->is(route('auth.login')) && $request->isMethod('post')) {
    //   return $next($request);
    // }

    // If user is authenticated but not admin, redirect to home
    if (!auth('admin')->user()?->is_admin) {
      return redirect()->route('home.index')->withErrors(['error' => 'Administrator privileges required.']);
    }

    // Otherwise return the request unaffected
    return $next($request);
  }
}
