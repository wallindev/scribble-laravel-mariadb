<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/img/scribble-bold.svg" />
@if (file_exists(public_path('hot')))
  @vite(['resources/css/app.module.styl', 'resources/js/app.js'])
@else
@php
  $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
  $cssPath = $manifest['resources/css/app.module.styl']['css'][0] ?? null;
  $cssAssetPath = asset("build/$cssPath");
  //$jsPath = $manifest['resources/js/app.js']['file'] ?? null;
  $jsAssetPath = Vite::asset('resources/js/app.js');
@endphp
@if ($cssAssetPath)
    <link rel="stylesheet" href="{{ $cssAssetPath }}">
@endif
@if ($jsAssetPath)
    <script type="module" src="{{ $jsAssetPath }}"></script>
@endif
@endif
    <title>Home - {{ config('app.name', 'Scribble! (from Blade)') }}</title>
  </head>
  <body>
    <header class="header">
      <nav class="main-nav">
        <div style="display: flex; justify-content: space-between; align-items: center">
          <div style="font-size: 2rem; font-weight: 600">
            <a href="{{ route('home.index') }}" title="To Home Start Page">Home</a>
          </div>
          <div>Right part of header</div>
        </div>
      </nav>
    @auth
      <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard </a>
    @if (Route::has('login'))
      <a href="{{ route('login') }}" class="login">Log in</a>
    @endif
    @if (Route::has('register'))
      <a href="{{ route('register') }}" class="register">Register</a>
    @endif
    @endauth
</header>
    <main class="container">
      @yield('content')
    </main>
    <footer>
      <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
        <div>&copy; {{ now()->year }} <a href="mailto: wallindev@gmail.com">wallindev</a></div>
        <div>Right part of footer</div>
      </div>
    </footer>
  </body>
</html>
