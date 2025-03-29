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
                @foreach ( $categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categoria.edit', $categoria ) }}">
                                <button title="Editar categoria">🖊</button>
                            </a>
                            <form action="{{ route('categoria.delete', $categoria) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button title="Eliminar categoria">🗑</button>
                            </form>
                        </td>
                    </tr>      
                @endforeach
                <form method="POST" action="{{ route('categoria.store') }}">
                    @csrf
                    <td><input type="text" name="nombre" id="nombre" placeholder="Nombre"></td>
                    <td><input type="text" name="descripcion" id="descripcion" placeholder="Descripción"></td>
                    <td>
                        <button title="Agregar categoría">➕</button>
                    </td>
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