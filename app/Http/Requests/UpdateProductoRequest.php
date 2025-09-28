<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('producto')->ID_PRODUCTO;

        return [
            'Codigo_producto'      => [
                'required',
                'string',
                'max:50',
                Rule::unique('producto', 'Codigo_producto')->ignore($id, 'ID_PRODUCTO'),
            ],
            'Referencia_producto' => 'required|string|max:100',
            'Color_producto'      => 'nullable|string|max:50',
            'Precio_producto'     => 'required|numeric|min:0',
            'Estado_producto'     => 'required|in:activo,inactivo',
            'categoria_id'        => 'required|integer|exists:categorias,ID_CATEGORIA',
            'usuarios_id'         => 'required|integer|exists:usuarios,ID_USUARIO',
        ];
    }

    public function messages(): array
    {
        return [
            'Codigo_producto.required' => 'El código del producto es obligatorio.',
            'Codigo_producto.unique'   => 'Este código ya está en uso.',
            'Referencia_producto.required' => 'La referencia es obligatoria.',
            'Precio_producto.required' => 'El precio es obligatorio.',
            'Precio_producto.min'      => 'El precio no puede ser negativo.',
            'Estado_producto.required' => 'El estado es obligatorio.',
            'categoria_id.exists'      => 'La categoría seleccionada no es válida.',
            'usuarios_id.exists'       => 'El usuario asociado no es válido.',
        ];
    }
}