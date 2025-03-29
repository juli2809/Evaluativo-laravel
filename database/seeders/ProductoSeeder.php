<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Smartphone Samsung Galaxy S23', 'descripcion' => 'Teléfono de última generación', 'precio' => 3200000, 'stock' => 25, 'categoria_id' => 1, 'imagen' => 'https://images.unsplash.com/photo-1560617544-b4f287789e24?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['nombre' => 'Sofá de cuero', 'descripcion' => 'Sofá de 3 plazas en cuero negro', 'precio' => 2400000, 'stock' => 10, 'categoria_id' => 2, 'imagen' => 'https://images.unsplash.com/photo-1616693153250-bb03055788eb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmxhY2slMjBzb2ZhfGVufDB8fDB8fHww'],
            ['nombre' => 'Camiseta Adidas', 'descripcion' => 'Camiseta deportiva de alta calidad', 'precio' => 120000, 'stock' => 50, 'categoria_id' => 3, 'imagen' => 'https://images.unsplash.com/photo-1511746315387-c4a76990fdce?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['nombre' => 'Bicicleta de montaña', 'descripcion' => 'Bicicleta todoterreno con 21 velocidades', 'precio' => 1400000, 'stock' => 15, 'categoria_id' => 4, 'imagen' => 'https://images.unsplash.com/photo-1511994298241-608e28f14fde?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['nombre' => 'El Principito', 'descripcion' => 'Clásico de la literatura infantil', 'precio' => 40000, 'stock' => 100, 'categoria_id' => 5, 'imagen' => 'https://images.unsplash.com/photo-1524159326054-584646eca4bb?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
