<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends AdminController {
  protected $request;

  public function __construct(Request $request) {
    $this->request = $request;
  }

  private function logoutAdmin(): void {
    // dump('before auth(\'admin\')->logout()');
    auth('admin')->logout();
    $this->request->session()->invalidate();
    $this->request->session()->regenerateToken();
    // dump('after auth(\'admin\')->logout()');
  }

  public function index() {
    // dump(session('url.intended'));
    $title = 'Log In';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/login' => 'Log In'
    ];
    return view('admin.login.index', compact('title', 'breadcrumbs'));
  }

  public function login(): RedirectResponse {
    $credentials = $this->request->only('email', 'password');

    if (!auth('admin')->attempt($credentials, $this->request->filled('remember'))) {
      return back()->withErrors(['email' => 'Wrong email or password.'])->onlyInput('email');
    }

    // if (!auth('admin')->user()?->is_admin) {
    //   $this->logoutAdmin();
    //   return back()->withErrors(['email' => 'You do not have administrator privileges.'])->onlyInput('email');
    // }

    // Use regenerate() or regenerateToken()?
    // $this->request->session()->regenerateToken();
    $this->request->session()->regenerate();

    $intended = session('url.intended');
    if (!$intended || !str_starts_with($intended, url('/admin'))) {
      $intended = route('admin.index');
    }
    return redirect()->to($intended);
    // return redirect()->intended(route('admin.index'));
  }

  public function logout(): RedirectResponse {
    // dump('function logout()');
    $this->logoutAdmin();
    // dd('after $this->logoutAdmin() in function logout()');
    return redirect()->route('auth.index');
  }
}
