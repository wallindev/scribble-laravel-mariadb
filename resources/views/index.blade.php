@extends('layouts.home')

@section('content')
<header class="header">
  @if (Route::has('login'))
  <nav class="nav">
    @auth
    <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard </a>
  @else
    <a href="{{ route('login') }}" class="login">Log in</a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="register">Register</a>
    @endif
    @endauth
  </nav>
  @endif
</header>
<h2>Index Page</h2>
<table>
  <tbody>
    @foreach ($links as $uri => $text)
    <tr>
      <td>
        <a href="{{ $uri }}">{{ $text }}</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
