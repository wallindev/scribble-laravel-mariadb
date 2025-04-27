<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

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

  public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (auth('admin')->attempt($credentials, $request->filled('remember'))) {
      $user = auth('admin')->user();

      if ($user && $user->is_admin) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.index'));
      } else {
        auth('admin')->logout();
        return back()->withErrors(['email' => 'You do not have administrator privileges.'])->onlyInput('email');
      }
    }
  }

  public function logout(Request $request) {
    auth('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.show');
  }
}