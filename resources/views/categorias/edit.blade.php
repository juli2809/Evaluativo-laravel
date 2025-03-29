@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="categorias">
        <table class="categorias">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $categorias as $categoriaInstance)
                    @if ($categoriaInstance == $categoria)
                    <form method="POST" action="{{ route('categoria.update', $categoria) }}">
                        <tr>
                            @csrf
                            @method('PATCH')
                            <td><input value="{{ old('nombre', $categoriaInstance['nombre']) }}" type="text" name="nombre" id="nombre" placeholder="Nombre"></td>
                            <td><input value="{{ old('descripcion', $categoriaInstance['descripcion']) }}" type="text" name="descripcion" id="descripcion" placeholder="Descripción"></td>
                            <td>
                                <button title="Guardar ediciones">✔</button>
                            </td>
                        </tr>
                    </form>
                    @else
                        <tr>
                            <td>{{ $categoriaInstance->nombre }}</td>
                            <td>{{ $categoriaInstance->descripcion }}</td>
                            <td>
                                <a href="{{ route('categoria.edit', $categoriaInstance ) }}">
                                    <button title="Editar categoria">🖊</button>
                                </a>
                                <form action="{{ route('categoria.delete', $categoriaInstance) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Eliminar categoria">🗑</button>
                                </form>
                            </td>
                        </tr>  
                    @endif
                        
                @endforeach
                <form method="POST" action="{{ route('categoria.store') }}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nombre" id="nombre" placeholder="Nombre"></td>
                        <td><input type="text" name="descripcion" id="descripcion" placeholder="Descripción"></td>
                        <td>
                            <button title="Agregar categoría">➕</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    @if($errors->any())
        <div  class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection