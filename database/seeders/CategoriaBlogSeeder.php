<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaBlog;

class CategoriaBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Tecnología', 'descripcion' => 'Novedades del mundo tecnológico'],
            ['nombre' => 'Salud y Bienestar', 'descripcion' => 'Consejos para una vida saludable'],
            ['nombre' => 'Viajes', 'descripcion' => 'Destinos, experiencias y recomendaciones'],
            ['nombre' => 'Negocios', 'descripcion' => 'Estrategias y tendencias empresariales'],
            ['nombre' => 'Cultura', 'descripcion' => 'Historia, arte y eventos culturales'],
        ];

        foreach ($categorias as $categoria) {
            CategoriaBlog::create($categoria);
        }
    }
}
