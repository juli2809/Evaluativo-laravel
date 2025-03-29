<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'  => 'El nombre de la categoría es obligatorio.',
            'nombre.string'    => 'El nombre debe ser un texto.',
            'nombre.max'       => 'El nombre no debe superar los 255 caracteres.',
            
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max'    => 'La descripción no debe superar los 1000 caracteres.',
        ];
    }
}
