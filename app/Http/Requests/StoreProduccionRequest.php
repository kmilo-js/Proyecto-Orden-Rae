<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduccionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Material_producto' => 'required|string|max:50',
            'Cantidad_producto' => 'required|integer|min:0',
            'Created_at' => 'nullable|date',
            'Updated_at' => 'nullable|date',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
            'producto_id' => 'required|integer|exists:producto,ID_PRODUCTO',
        ];
    }

    public function messages()
    {
        return [
            'Material_producto.required' => 'El material es obligatorio.',
            'Cantidad_producto.required' => 'Debe ingresar la cantidad.',
            'Cantidad_producto.integer' => 'La cantidad debe ser un número entero.',
            'Cantidad_producto.min' => 'La cantidad no puede ser negativa.',
            'Created_at.date' => 'La fecha de creación no es válida.',
            'Updated_at.date' => 'La fecha de actualización no es válida.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
            'producto_id.exists' => 'El producto asignado no existe.',
        ];
    }
} 