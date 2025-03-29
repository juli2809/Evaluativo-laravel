@extends('layouts.app')

@section('title', 'Nuevo producto')

@section('content')
    <form method="POST" action="{{ route('producto.update', $producto) }}" class="editar_producto">
        @csrf
        @method('PATCH')
        <div class="img">
            <input value="{{ old('imagen', $producto['imagen']) }}" type="url" name="imagen" id="url" placeholder="Url de la imagen del producto" autocomplete="off">
        </div>
        <input value="{{ old('nombre', $producto['nombre']) }}" type="text" name="nombre" id="nombre" placeholder="Nombre del producto" autocomplete="off">
        <input value="{{ old('descripcion', $producto['descripcion']) }}" type="text" name="descripcion" id="descripcion" placeholder="Descripción del producto" autocomplete="off">
        <input value="{{ old('stock', $producto['stock']) }}" type="number" name="stock" id="stock" placeholder="En stock" autocomplete="off">
        <select name="categoria_id" id="categoria" autocomplete="off">
            <option value="null" disabled>Categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if(old('categoria_id', $producto['categoria_id']) == $categoria->id ) selected @endif>{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <input value="{{ old('precio', $producto['precio']) }}" type="number" name="precio" id="precio" placeholder="Precio del producto">
        <button>Guardar ediciones</button>
    </form>
    @if($errors->any())
        <div  class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection