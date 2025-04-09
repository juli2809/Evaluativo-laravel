<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')
            ->when(request('search'), function($query) {
                return $query->where('nombre', 'like', '%'.request('search').'%');
            })
            ->when(request('categoria'), function($query) {
                return $query->where('categoria_id', request('categoria'));
            })
            ->get();

        $categorias = \App\Models\Categoria::all();
        
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        
        if ($categorias->isEmpty()) {
            return redirect()->route('categorias.create')
                ->with('alert', [
                    'type' => 'warning',
                    'title' => 'Atención',
                    'text' => 'Primero debe crear al menos una categoría'
                ]);
        }

        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string'
        ]);

        $producto = Producto::create($request->all());
        
        return redirect()->route('producto.index')
            ->with('alert', [
                'type' => 'success',
                'title' => 'Éxito',
                'text' => 'Producto creado correctamente'
            ]);
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = \App\Models\Categoria::all();
        
        if ($categorias->isEmpty()) {
            return redirect()->route('categorias.create')
                ->with('alert', [
                    'type' => 'warning',
                    'title' => 'Atención',
                    'text' => 'Primero debe crear al menos una categoría'
                ]);
        }

        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string'
        ]);

        $producto->update($request->all());
        
        return redirect()->route('producto.index')
            ->with('alert', [
                'type' => 'success',
                'title' => 'Éxito',
                'text' => 'Producto actualizado correctamente'
            ]);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        
        return redirect()->route('producto.index')
            ->with('success', 'Producto eliminado exitosamente');
    }
}
