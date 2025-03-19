@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <p>Category: {{ $article->category->name }}</p>
    @if($article->featured_image)
        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid">
    @endif
    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Article List</a>
</div>
@endsection
