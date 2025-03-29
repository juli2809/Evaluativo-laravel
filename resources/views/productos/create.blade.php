@extends('layouts.app')

@section('title', 'Nuevo producto')

@section('content')
    <form method="POST" action="{{ route('producto.store') }}" class="producto_nuevo">
        @csrf
        <div class="img">
            <input type="url" name="imagen" id="url" placeholder="URL imagen." autocomplete="off">
        </div>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre." autocomplete="off">
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción." autocomplete="off">
        <input type="number" name="stock" id="stock" placeholder="Stock" autocomplete="off">
        <select name="categoria_id" id="categoria" autocomplete="off">
            <option value="null" selected disabled>Categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <input type="number" name="precio" id="precio" placeholder="Precio.">
        <button>Agregar</button>
    </form>
    @if($errors->any())
        <div  class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection