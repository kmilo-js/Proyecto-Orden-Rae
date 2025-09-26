<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Cantidad_producto' => 'required|integer|min:0',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
            'ID_PRODUCTO' => 'required|integer|exists:producto,ID_PRODUCTO',
        ];
    }

    public function messages()
    {
        return [
            'Cantidad_producto.required' => 'Debe ingresar la cantidad.',
            'Cantidad_producto.integer' => 'La cantidad debe ser un número entero.',
            'Cantidad_producto.min' => 'La cantidad no puede ser negativa.',
            'usuarios_id.required' => 'Debe seleccionar un usuario.',
            'usuarios_id.integer' => 'El usuario seleccionado no es válido.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
            'ID_PRODUCTO.required' => 'Debe seleccionar un producto.',
            'ID_PRODUCTO.integer' => 'El producto seleccionado no es válido.',
            'ID_PRODUCTO.exists' => 'El producto asignado no existe.',
        ];
    }
}
