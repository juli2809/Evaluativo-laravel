@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
    <div class="producto_detalle">
        <img src="{{ $producto->imagen }}" alt="">
        <h2>{{ $producto->nombre }}</h2>
        <p>{{ $producto->descripcion }}</p>
        <p class="stock"><b>Disponibles:</b> {{ $producto->stock }} </p>
        <p class="categoria"><b>Categoria:</b> {{ $producto->categoria->nombre }} </p>
        <div class="comprar">
            <span class="precio">{{ $producto->precio }}</span><button class="agregar-compra">🛒</button>
        </div>
        <div class="detalles">
            <div class="actions">
                <a href="{{ route('producto.edit', $producto) }}">
                    <button title="Editar producto">🖊</button>
                </a>
                <form action="{{ route('producto.delete', $producto) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button title="Eliminar producto">🗑</button>
                </form>
            </div>
        </div>
    </div>
       
@endsection