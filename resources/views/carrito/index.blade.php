@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <h1>Carrito</h1>
    @if(empty($carrito))
        <p>No hay productos.</p>
    @else
        <ul>
            @foreach($productos as $producto)
                <li>
                    <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" style="width: 50px; height: auto;">
                    Producto: {{ $producto->nombre }} - Precio: {{ $producto->precio }} - Cantidad: {{ $carrito[$producto->id] }}

                    <form method="POST" action="{{ route('carrito.eliminar', $producto->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
