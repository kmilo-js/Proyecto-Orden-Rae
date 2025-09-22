<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Referencia_producto' => [
                'required',
                'string',
                'max:50',
                Rule::unique('inventario', 'Referencia_producto')->ignore($this->inventario),
            ],
            'Categoria_producto' => 'required|string|max:50',
            'Color_producto' => 'required|string|max:30',
            'Cantidad_producto' => 'required|integer|min:0',
            'Estado_producto' => 'required|string|in:DISPONIBLE,AGOTADO,EN PRODUCCIÓN',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
        ];
    }

    public function messages()
    {
        return [
            'Referencia_producto.required' => 'La referencia es obligatoria.',
            'Referencia_producto.unique' => 'Esta referencia ya está en uso.',
            'Categoria_producto.required' => 'La categoría es obligatoria.',
            'Color_producto.required' => 'El color es obligatorio.',
            'Cantidad_producto.required' => 'Debe ingresar la cantidad.',
            'Cantidad_producto.integer' => 'La cantidad debe ser un número entero.',
            'Cantidad_producto.min' => 'La cantidad no puede ser negativa.',
            'Estado_producto.required' => 'Debe indicar el estado del producto.',
            'Estado_producto.in' => 'El estado debe ser: Disponible, Agotado o En Producción.',
            'usuarios_id.required' => 'Debe seleccionar un usuario.',
            'usuarios_id.integer' => 'El usuario seleccionado no es válido.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
        ];
    }
}