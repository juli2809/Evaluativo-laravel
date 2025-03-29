<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string|max:1000',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen'       => 'nullable|url',
        ];
    }
    
    public function messages(): array
    {
        return [
            'nombre.required'      => 'El nombre del producto es obligatorio.',
            'nombre.string'        => 'El nombre debe ser un texto.',
            'nombre.max'           => 'El nombre no debe exceder los 255 caracteres.',
            
            'descripcion.string'   => 'La descripción debe ser un texto.',
            'descripcion.max'      => 'La descripción no debe exceder los 1000 caracteres.',
            
            'precio.required'      => 'El precio del producto es obligatorio.',
            'precio.numeric'       => 'El precio debe ser un número.',
            'precio.min'           => 'El precio no puede ser negativo.',
            
            'stock.required'       => 'El stock es obligatorio.',
            'stock.integer'        => 'El stock debe ser un número entero.',
            'stock.min'            => 'El stock no puede ser negativo.',
            
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists'   => 'La categoría seleccionada no es válida.',
            
            'imagen.url'           => 'La imagen debe ser una URL válida.',
            'imagen.max'           => 'La URL de la imagen no debe exceder los 2048 caracteres.',
        ];
    }
}
