<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

class CarritoController extends Controller

{
    public function agregar(Request $request, $productoId)
    {
        // Lógica para agregar un producto al carrito
        $carrito = session()->get('carrito', []);
        $carrito[$productoId] = $request->input('cantidad', 1);
        session()->put('carrito', $carrito);
        return redirect()->route('producto.index')->with('success', 'Producto agregado al carrito.');
    }

    public function eliminar($productoId)
    {
        // Lógica para eliminar un producto del carrito
        $carrito = session()->get('carrito', []);
        unset($carrito[$productoId]);
        session()->put('carrito', $carrito);
        return redirect()->route('producto.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function mostrar()
    {
        // Lógica para mostrar los productos en el carrito
        $carritoIds = session()->get('carrito', []);
        $productos = Producto::whereIn('id', array_keys($carritoIds))->get();
        return view('carrito.index', ['productos' => $productos, 'carrito' => $carritoIds]);
    }



    // Eliminar métodos duplicados

}
