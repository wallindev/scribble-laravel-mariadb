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
    <title>Admin - {{ config('app.name', 'Scribble! (from Blade)') }}</title>
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
