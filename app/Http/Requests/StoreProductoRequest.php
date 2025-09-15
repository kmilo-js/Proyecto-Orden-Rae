<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'Referencia_producto' => 'required|string|max:50',
            'Categoria_producto' => 'required|string|max:50',
            'Color_producto' => 'required|string|max:30',
            'Cantidad_producto' => 'required|integer|min:0',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
            'inventario_id' => 'required|integer|exists:inventario,ID_INVENTARIO',
        ];
    }
    public function messages()
    {
        return [
            'Referencia_producto.required' => 'La referencia es obligatoria.',
            'Referencia_producto.unique' => 'Ya existe un producto con esa referencia.',
            'Categoria_producto.required' => 'La categoría es obligatoria.',
            'Cantidad_producto.required' => 'Debe ingresar la cantidad.',
            'Cantidad_producto.min' => 'La cantidad no puede ser negativa.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
            'inventario_id.exists' => 'El inventario seleccionado no existe.',
            'usuarios_id.integer' => 'El ID del usuario debe ser un número entero válido.',
            'inventario_id.integer' => 'El ID del inventario debe ser un número entero válido.',
        ];
    }
}
