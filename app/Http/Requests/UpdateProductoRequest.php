<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'usuarios_id' => 'integer|exists:usuarios,ID_USUARIO',
            'inventario_id' => 'integer|exists:inventario,ID_INVENTARIO',
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
        ];
    }
}
