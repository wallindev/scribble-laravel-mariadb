@extends('layouts.admin')

@section('content')
<h2>Articles</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Headline</th>
      <th>Content</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    <tr>
      <td>{{ $article->id }}</td>
      <td>{{ $article->headline }}</td>
      <td>{{ $article->content }}</td>
      <td>
        <!-- Add action buttons here (edit, delete, etc.) -->
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
