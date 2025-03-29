@extends('layouts.app')

@section('title', $categoria->nombre)

@section('content')
    <h1>{{ $categoria->nombre }}</h1>
    <p>{{ $categoria->descripcion }}</p>
    <a href="{{ route('categoria.edit', $categoria) }}">Editar Categoría</a>
@endsection
