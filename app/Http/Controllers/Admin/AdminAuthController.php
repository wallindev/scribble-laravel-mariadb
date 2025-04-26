<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends AdminController {
  public function show() {
    $title = 'Show Article';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/login' => 'Log In'
    ];
    return view('admin.login.show', compact('title', 'breadcrumbs'));
  }

  public function login_old(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
      $request->session()->regenerate();
      return redirect()->intended('/admin/dashboard'); // Redirect to the admin dashboard
    }

    return back()->withErrors([
      'email' => 'Invalid credentials.',
    ])->onlyInput('email');
  }

  public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
      $user = Auth::guard('admin')->user();

      if ($user && $user->is_admin) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
      } else {
        Auth::guard('admin')->logout(); // Log them out if not an admin
        return back()->withErrors([
          'email' => 'You do not have administrator privileges.',
        ])->onlyInput('email');
      }
    }

    return back()->withErrors([
      'email' => 'Invalid credentials.',
    ])->onlyInput('email');
  }

  public function logout(Request $request) {
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.show');
  }
}