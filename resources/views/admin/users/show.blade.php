@extends('layouts.admin')

@section('content')
<h2>User Details</h2>
@if($success)
<div class="text-primary"><p>{{ $success }}</p></div>
@endif
<section>
<table>
  <tbody>
    <tr>
      <td><strong>ID:</strong></td><td>{{ $user->id }}</td>
    </tr>
    <tr>
      <td><strong>Name:</strong></td><td>{{ $user->name }}</td>
    </tr>
    <tr>
      <td><strong>Email:</strong></td><td>{{ $user->email }}</td>
    </tr>
    <tr>
      <td class="button"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm" role="button">Edit User</a></td>
      <td class="button button--right"><a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm" role="button">All Users &raquo;</a></td>
    </tr>
  </tbody>
</table>
</section>
@endsection
