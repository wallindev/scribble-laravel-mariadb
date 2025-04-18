@extends('layouts.home')

@section('content')
<h2>Home Start Page</h2>
<section>
<table>
  <tbody>
  @foreach ($links as $uri => $text)
    <tr>
      <td><a href="{{ $uri }}">{{ $text }}</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
</section>
@endsection
