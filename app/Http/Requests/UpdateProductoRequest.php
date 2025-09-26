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
            'Codigo_producto' => 'required|string|max:255',
            'Referencia_producto' => 'required|string|max:255|unique:producto,Referencia_producto,' . $this->producto->ID_PRODUCTO . ',ID_PRODUCTO',
            'Color_producto' => 'nullable|string|max:100',
            'Precio_producto' => 'required|numeric|min:0',
            'Estado_producto' => 'required|string|max:50',
            'usuarios_id' => 'required|exists:usuarios,ID_USUARIO|integer',
            'categoria_id' => 'required|exists:categorias,ID_CATEGORIA|integer',
        ];
    }
    public function messages()
    {
        return [
            'Codigo_producto.required' => 'El código del producto es obligatorio.',
            'Codigo_producto.string' => 'El código del producto debe ser una cadena de texto.',
            'Codigo_producto.max' => 'El código del producto no debe exceder los 255 caracteres.',

            'Referencia_producto.required' => 'La referencia del producto es obligatoria.',
            'Referencia_producto.string' => 'La referencia del producto debe ser una cadena de texto.',
            'Referencia_producto.max' => 'La referencia del producto no debe exceder los 255 caracteres.',
            'Referencia_producto.unique' => 'La referencia del producto ya está en uso.',

            'Cantidad_producto.required' => 'La cantidad del producto es obligatoria.',
            'Cantidad_producto.integer' => 'La cantidad del producto debe ser un número entero.',
            'Cantidad_producto.min' => 'La cantidad del producto no puede ser negativa.',

            'usuarios_id.required' => 'El usuario es obligatorio.',
            'usuarios_id.exists' => 'El usuario seleccionado no existe.',
            'usuarios_id.integer' => 'El ID del usuario debe ser un número entero.',

            'inventario_id.required' => 'El inventario es obligatorio.',
            'inventario_id.exists' => 'El inventario seleccionado no existe.',
            'inventario_id.integer' => 'El ID del inventario debe ser un número entero.',

            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
            'categoria_id.integer' => 'El ID de la categoría debe ser un número entero.',   
        ];
    }
}
