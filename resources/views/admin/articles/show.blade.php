@extends('layouts.admin')

@section('content')
    <h2>Article Details</h2>
    <p><strong>ID:</strong> {{ $article->id }}</p>
    <p><strong>Title:</strong> {{ $article->title }}</p>
    <p><strong>Content:</strong> {{ $article->content }}</p>
    <a href="{{ route('admin.articles.edit', $article->id) }}">Edit Article</a>
@endsection
