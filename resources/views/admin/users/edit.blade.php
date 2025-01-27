@extends('layouts.admin')

@section('content')
<h2>Edit User</h2>
@if ($errors->any())
<div class="text-danger bg-dark">
  @foreach ($errors->all() as $error)
    <p>- {{ $error }}</p>
  @endforeach
</div>
@endif
<section>
<form action="{{ route('users.update', $user->id) }}" method="POST">
  @csrf
  @method('PATCH')
  <table>
    <tbody>
      <tr>
        <td><label for="name">Name:</label></td>
        <td><input type="text" id="name" name="name" value="{{ $user->name }}" required></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" id="email" name="email" value="{{ $user->email }}" required></td>
      </tr>
      <tr>
        <td class="button"><button type="submit" class="btn btn-outline-primary btn-sm">Update User</button></td>
        <td class="button button--right"><a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary btn-sm" role="button">Cancel</a></td>
      </tr>
    </tbody>
  </table>
</form>
</section>
@endsection
