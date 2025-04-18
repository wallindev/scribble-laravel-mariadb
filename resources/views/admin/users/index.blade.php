@extends('layouts.admin')

@section('content')
<h2>Users</h2>
@if ($success)
<div class="text-primary"><p>{{ $success }}</p></div>
@endif
<section>
<div style="margin: 1.5rem .5rem;"><a href="{{ route('users.create') }}">Create User</a></div>
<table>
  <thead>
    <tr class="heading">
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    @php $userUrl = route('users.show', $user->id); @endphp
    <tr>
      <td><a href="{{ $userUrl }}">{{ $user->id }}</a></td>
      <td><a href="{{ $userUrl }}">{{ $user->firstname }} {{ $user->lastname }}</a></td>
      <td><a href="{{ $userUrl }}">{{ $user->email }}</a></td>
      <td><a href="{{ $userUrl }}" class="btn btn-dark btn-sm" role="button">Show</a></td>
      <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark btn-sm" role="button">Edit</a></td>
      <td>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Delete this user?');" class="link-button secondary">Delete</a>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</section>
@endsection
