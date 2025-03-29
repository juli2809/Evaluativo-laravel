<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Electrónica', 'descripcion' => 'Dispositivos y accesorios tecnológicos'],
            ['nombre' => 'Hogar', 'descripcion' => 'Artículos para el hogar y decoración'],
            ['nombre' => 'Ropa', 'descripcion' => 'Moda y vestimenta para todas las edades'],
            ['nombre' => 'Deportes', 'descripcion' => 'Equipamiento y accesorios deportivos'],
            ['nombre' => 'Libros', 'descripcion' => 'Libros de diferentes géneros y autores'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
