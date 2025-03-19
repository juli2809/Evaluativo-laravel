@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Category List</a>
</div>
@endsection
