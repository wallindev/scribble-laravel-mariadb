@extends('layouts.admin')

@section('content')
<h2>Users</h2>
<section>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
  @php $userUrl = route('users.show', $user->id) @endphp
    <tr>
      <td><a href="{{ $userUrl }}">{{ $user->id }}</a></td>
      <td><a href="{{ $userUrl }}">{{ $user->name }}</a></td>
      <td>{{ $user->email }}</td>
      <td><a href="{{ $userUrl }}" class="btn btn-dark btn-sm" role="button">Show</a></td>
      <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark btn-sm" role="button">Edit</a></td>
      <td>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Delete this user?');" class="btn btn-outline-secondary btn-sm">Delete</a>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</section>
@endsection
