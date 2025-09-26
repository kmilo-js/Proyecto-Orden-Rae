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
            'Codigo_producto' => 'required|string|max:255|unique:producto,Codigo_producto',
            'Referencia_producto' => 'required|string|max:255|unique:producto,Referencia_producto',
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
            'Codigo_producto.unique' => 'El código del producto ya está en uso.',

            'Referencia_producto.required' => 'La referencia del producto es obligatoria.',
            'Referencia_producto.string' => 'La referencia del producto debe ser una cadena de texto.',
            'Referencia_producto.max' => 'La referencia del producto no debe exceder los 255 caracteres.',
            'Referencia_producto.unique' => 'La referencia del producto ya está en uso.',

            'Color_producto.string' => 'El color del producto debe ser una cadena de texto.',
            'Color_producto.max' => 'El color del producto no debe exceder los 100 caracteres.',

            'Precio_producto.required' => 'El precio del producto es obligatorio.',
            'Precio_producto.numeric' => 'El precio del producto debe ser un número.',
            'Precio_producto.min' => 'El precio del producto no puede ser negativo.',

            'Estado_producto.required' => 'El estado del producto es obligatorio.',
            'Estado_producto.string' => 'El estado del producto debe ser una cadena de texto.',
            'Estado_producto.max' => 'El estado del producto no debe exceder los 50 caracteres.',

            'usuarios_id.required' => 'El ID de usuario es obligatorio.',
            'usuarios_id.exists' => 'El ID de usuario seleccionado no existe.',
            'usuarios_id.integer' => 'El ID de usuario debe ser un número entero.',

            'categoria_id.required' => 'El ID de categoría es obligatorio.',
            'categoria_id.exists' => 'El ID de categoría seleccionado no existe.',
            'categoria_id.integer' => 'El ID de categoría debe ser un número entero.',
        ];
    }
}
