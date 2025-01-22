@extends('layouts.admin')

@section('content')
    <h2>Edit Article</h2>
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $article->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $article->content }}</textarea>
        </div>
        <button type="submit">Update Article</button>
    </form>
@endsection
