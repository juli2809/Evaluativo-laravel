<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create($request->all());
        
        return redirect()->route('categoria.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());
        
        return redirect()->route('categoria.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        
        return redirect()->route('categoria.index')
            ->with('success', 'Categoría eliminada exitosamente');
    }
}
