<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/img/scribble-bold.svg" />
    <style>
      @font-face {
        font-family: Roboto;
        font-style: normal;
        font-weight: 100 900;
        font-display: swap;
        src: url(/fonts/Roboto-VariableFont_wdth,wght.ttf) format('truetype');
      }
    </style>
  @if (file_exists('vite.config.js') || file_exists(public_path('hot')))
    @vite(['resources/css/app.module.styl', 'resources/js/app.js'])
  @else
    <style>
      /* Custom Style */
    </style>
  @endif
    <title>Admin - {{ config('app.name', 'Scribble! (from Blade)') }}</title>
  </head>
  <body>
    <header>
      <nav class="main-nav">
        <div style="display: flex; justify-content: space-between; align-items: center">
          <div style="font-size: 2rem; font-weight: 600">
            <a href="{{ route('admin.index') }}" title="To Admin Start Page">Admin</a>
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
