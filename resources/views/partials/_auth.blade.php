    @auth
      <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard </a>
    @if (Route::has('login'))
      <a href="{{ route('login') }}" class="login">Log in</a>
    @endif
    @if (Route::has('register'))
      <a href="{{ route('register') }}" class="register">Register</a>
    @endif
    @endauth
