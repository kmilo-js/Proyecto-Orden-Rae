<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Nombre_categoria' => 'required|string|max:255',
            'Estado_categoria' => 'required|in:activo,inactivo',
        ];
    }

    public function messages()
    {
        return [
            'Nombre_categoria.required' => 'Debe ingresar el nombre de la categoría.',
            'Nombre_categoria.string' => 'El nombre debe ser texto.',
            'Nombre_categoria.max' => 'El nombre no puede exceder 255 caracteres.',
            'Estado_categoria.required' => 'Debe seleccionar un estado.',
            'Estado_categoria.in' => 'El estado debe ser "activo" o "inactivo".',
        ];
    }
}
