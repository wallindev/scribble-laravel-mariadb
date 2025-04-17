@extends('layouts.admin')

@section('content')
<h2>Admin Start Page</h2>
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
