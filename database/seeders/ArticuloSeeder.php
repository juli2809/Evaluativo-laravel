<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\CategoriaBlog;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articulos = [
            ['titulo' => 'El futuro de la inteligencia artificial', 'contenido' => 'La IA está revolucionando el mundo.', 'imagen_destacada' => 'https://images.unsplash.com/photo-1525338078858-d762b5e32f2c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'autor' => 'Carlos Méndez', 'categoria_blog_id' => 1, 'fecha_publicacion' => now()],
            ['titulo' => 'Cómo mejorar tu alimentación', 'contenido' => 'Consejos prácticos para una dieta balanceada.', 'imagen_destacada' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1453&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'autor' => 'María López', 'categoria_blog_id' => 2, 'fecha_publicacion' => now()],
            ['titulo' => 'Lugares mágicos en América Latina', 'contenido' => 'Explora estos destinos impresionantes.', 'imagen_destacada' => 'https://images.unsplash.com/photo-1606065284148-2fa68ffd3a3b?q=80&w=1473&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'autor' => 'Juan Pérez', 'categoria_blog_id' => 3, 'fecha_publicacion' => now()],
            ['titulo' => 'Estrategias para emprendedores', 'contenido' => 'Cómo lanzar un negocio exitoso.', 'imagen_destacada' => 'https://plus.unsplash.com/premium_photo-1674273912660-5ecb2956fd93?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZW50ZXJwcmVuZXVyfGVufDB8fDB8fHww', 'autor' => 'Ana González', 'categoria_blog_id' => 4, 'fecha_publicacion' => now()],
            ['titulo' => 'Los museos más visitados del mundo', 'contenido' => 'Descubre los museos más fascinantes.', 'imagen_destacada' => 'https://images.unsplash.com/photo-1518998053901-5348d3961a04?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'autor' => 'Roberto Castillo', 'categoria_blog_id' => 5, 'fecha_publicacion' => now()],
        ];

        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
