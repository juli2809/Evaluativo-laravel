<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Taller Laravel')</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <nav>
    <a href="{{ route('producto.create') }}">Añadir producto</a>

            <a href="{{ route('producto.index') }}">
                Productos
            </a>
            <a href="{{ route('categoria.index') }}">
                Categorías
            </a>
            <a href="{{ route('carrito.mostrar') }}">
                Carrito-<span>{{ session()->get('carrito') ? count(session()->get('carrito')) : 0 }}</span>
            </a>
          
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
