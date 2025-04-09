<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Producto $producto)
    {
        $carrito = session()->get('carrito', []);
        
        if(isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad']++;
        } else {
            $carrito[$producto->id] = [
                'producto' => $producto,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);
        
        return redirect()->back()
            ->with('success', 'Producto agregado al carrito');
    }

    public function eliminar(Producto $producto)
    {
        $carrito = session()->get('carrito', []);
        
        if(isset($carrito[$producto->id])) {
            unset($carrito[$producto->id]);
            session()->put('carrito', $carrito);
        }
        
        return redirect()->back()
            ->with('success', 'Producto eliminado del carrito');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.mostrar', compact('carrito'));
    }
}
