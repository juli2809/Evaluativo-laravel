<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'contenido',
        'nombre_usuario',
        'email',
        'articulo_id',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
