<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/img/scribble-bold.svg" />
  @if (file_exists('vite.config.js') || file_exists(public_path('hot')))
    @vite(['resources/css/app.module.styl', 'resources/js/app.js'])
  @else
    <style>
      /* Custom Style */
    </style>
  @endif
    <title>Home - {{ config('app.name', 'Scribble! (from Blade)') }}</title>
  </head>
  <body>
    <header>
      <nav class="main-nav">
        <div style="display: flex; justify-content: space-between; align-items: center">
          <div style="font-size: 2rem; font-weight: 600">
            <a href="{{ route('home.index') }}" title="To Home Start Page">Home</a>
          </div>
          <div>Right part of header</div>
        </div>
      </nav>
    </header>
    <main class="container">
      @yield('content')
    </main>
    <footer>
      <div style="display: flex; justify-content: space-between; align-items: center">
        <div>&copy; {{ now()->year }} <a href="mailto: wallindev@gmail.com">wallindev</a></div>
        <div>Right part of footer</div>
      </div>
    </footer>
  </body>
</html>
