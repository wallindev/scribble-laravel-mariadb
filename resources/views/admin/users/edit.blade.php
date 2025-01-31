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
        <td><label for="firstname">Firstname</label>:</td>
        <td><input type="text" id="firstname" name="firstname" value="{{ $user->firstname }}" required></td>
      </tr>
      <tr>
        <td><label for="lastname">Lastname</label>:</td>
        <td><input type="text" id="lastname" name="lastname" value="{{ $user->lastname }}" required></td>
      </tr>
      <tr>
        <td><label for="email">Email</label>:</td>
        <td><input type="email" id="email" name="email" value="{{ $user->email }}" required></td>
      </tr>
      <tr>
        <td><label for="password">Password</label>:</td>
        <td><input type="password" id="password" name="password"></td>
      </tr>
      <tr>
        <td><label for="confirm_password">Confirm Password</label>:</td>
        <td><input type="password" id="confirm_password" name="confirm_password"></td>
      </tr>
      <tr>
        <td><label for="email_verified">Email Verified</label>:</td>
        <td><input type="checkbox" id="email_verified" name="email_verified"{!! $user->email_verified ? ' value="1"' : '' !!}{{ $user->email_verified ? ' checked' : '' }}></td>
      </tr>
      <tr>
        <td><label for="is_admin">Is Admin</label>:</td>
        <td><input type="checkbox" id="is_admin" name="is_admin"{!! $user->is_admin ? ' value="1"' : '' !!}{{ $user->is_admin ? ' checked' : '' }}></td>
      </tr>
      <tr>
        <td><label for="created_at">Created</label>: <span id="created_at">{{ $user->created_at }}</span></td>
        <td><label for="updated_at">Updated</label>: <span id="updated_at">{{ $user->updated_at }}</span></td>
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
