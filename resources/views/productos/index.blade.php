@extends('layouts.app')

@section('title', 'Productos')

@section('content')

    <form method="GET" action="{{ route('producto.index') }}" class="filtrar-productos" onsubmit="this.search.value = document.getElementById('search').value;">
        <label for="search">Buscar </label>
        <input type="text" name="search" id="search" class="buscador" value="{{ request('search') }}">
        <label for="categoria"> Filtrar</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="productos">
        @foreach ($productos as $producto)
            <div class="producto">
                <img src="{{ $producto->imagen }}" alt="">
                <h2>{{ $producto->nombre }}</h2>
                <div class="comprar">
                    <span class="precio">{{ $producto->precio }}</span>
                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button title="Añadir al carrito" class="agregar-compra">🛒</button>
                    </form>
                </div>
                <div class="detalles">
                    <a href="{{ route('producto.show', $producto) }}">Detalles</a>
                        <a href="{{ route('producto.edit', $producto) }}">
                            <button title="Editar producto">Editar</button>
                        </a>
                        <form action="{{ route('producto.delete', $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="Eliminar producto">Eliminar</button>
                        </form>
                </div>
            </div>
        @endforeach
    </div>

    <br>

@endsection
