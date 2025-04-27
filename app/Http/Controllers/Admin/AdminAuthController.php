<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthController extends AdminController {
  public function show() {
    $title = 'Log In';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/login' => 'Log In'
    ];
    return view('admin.login.show', compact('title', 'breadcrumbs'));
  }

  public function login(Request $request): Response {
    $credentials = $request->only('email', 'password');

    if (!auth('admin')->attempt($credentials, $request->filled('remember'))) {
      return back()->withErrors(['email' => 'Wrong email or password.'])->onlyInput('email');
    }

    if (auth('admin')->user()?->is_admin) {
      $request->session()->regenerate();
      return redirect()->intended(route('admin.index'));
    } else {
      auth('admin')->logout();
      return back()->withErrors(['email' => 'You do not have administrator privileges.'])->onlyInput('email');
    }
  }

  public function logout(Request $request): Response {
    auth('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.show');
  }

  public function isAuthenticated(): bool {
    return auth('admin')->check();
  }
}
