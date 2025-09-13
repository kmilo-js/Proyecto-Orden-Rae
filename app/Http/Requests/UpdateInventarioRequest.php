<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarioRequest extends FormRequest
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
            $id = $this->route('inventario') ? $this->route('inventario')->ID_INVENTARIO : null;
        return [
            'Referencia_producto' => [
                'required','string','max:50',
                Rule::unique('producto','Referencia_producto')->ignore($id, 'ID_INVENTARIO') // reemplaza 'ID_INVENTARIO' si tu PK tiene otro nombre
            ],
            'Categoria_producto' => 'required|string|max:50',
            'Color_producto' => 'required|string|max:30',
            'Cantidad_producto' => 'required|integer|min:0',
            'Estado_producto' => 'required|string|in:Disponible,Agotado,En Producción', // ejemplo con estados fijos
            'Created_at' => 'required|date',
            'Updated_at' => 'nullable|date',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
        ];
    }

    public function messages()
    {
        return [
            'Referencia_producto.required' => 'La referencia es obligatoria.',
            'Categoria_producto.required' => 'La categoría es obligatoria.',
            'Color_producto.required' => 'El color es obligatorio.',
            'Cantidad_producto.required' => 'Debe ingresar la cantidad.',
            'Cantidad_producto.integer' => 'La cantidad debe ser un número entero.',
            'Cantidad_producto.min' => 'La cantidad no puede ser negativa.',
            'Estado_producto.required' => 'Debe indicar el estado del producto.',
            'Estado_producto.in' => 'El estado debe ser: Disponible, Agotado o En Producción.',
            'Created_at.required' => 'La fecha de creación es obligatoria.',
            'Created_at.date' => 'La fecha de creación no tiene un formato válido.',
            'Updated_at.date' => 'La fecha de actualización no tiene un formato válido.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
        ];
    }
}
