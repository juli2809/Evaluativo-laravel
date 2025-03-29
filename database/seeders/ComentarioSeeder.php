<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\Articulo;
use Faker\Factory as Faker;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener todos los artículos
        $articulos = Articulo::all();

        foreach ($articulos as $articulo) {
            // Agregar de 1 a 3 comentarios por artículo
            $numComentarios = rand(1, 3);

            for ($i = 0; $i < $numComentarios; $i++) {
                Comentario::create([
                    'contenido' => $faker->paragraph(),
                    'nombre_usuario' => $faker->name(),
                    'email' => $faker->email(),
                    'articulo_id' => $articulo->id,
                ]);
            }
        }
    }
}
