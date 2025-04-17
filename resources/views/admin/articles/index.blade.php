@extends('layouts.admin')

@section('content')
<h2>Articles</h2>
@if ($success)
<div class="text-primary"><p>{{ $success }}</p></div>
@endif
<section>
<div style="margin: 1.5rem .5rem;"><a href="{{ route('users.create') }}">Create Article</a></div>
<table>
  <thead>
    <tr class="heading">
      <th>ID</th>
      <th>Title</th>
      <th>Content</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    @php $articleUrl = route('articles.show', $article->id); @endphp
    <tr>
      <td><a href="{{ $articleUrl }}">{{ $article->id }}</a></td>
      <td><a href="{{ $articleUrl }}">{{ $article->title }}</a></td>
      <td><a href="{{ $articleUrl }}">{{ contentStub($article->content) }}</a></td>
      <td><a href="{{ $articleUrl }}" class="btn btn-dark btn-sm" role="button">Show</a></td>
      <td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-dark btn-sm" role="button">Edit</a></td>
      <td>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Delete this article?');" class="link-button secondary">Delete</a>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
