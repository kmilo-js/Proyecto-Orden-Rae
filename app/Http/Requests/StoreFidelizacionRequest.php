<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFidelizacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Fecha_de_fidelizacion' => 'required|date',
            'Total_de_producto' => 'required|integer|min:0',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
        ];
    }

    public function messages()
    {
        return [
            'Fecha_de_fidelizacion.required' => 'La fecha de fidelización es obligatoria.',
            'Fecha_de_fidelizacion.date' => 'La fecha de fidelización no es válida.',
            'Total_de_producto.required' => 'El total de productos es obligatorio.',
            'Total_de_producto.integer' => 'El total de productos debe ser un número entero.',
            'Total_de_producto.min' => 'El total de productos no puede ser negativo.',
            'usuarios_id.required' => 'Debe seleccionar un usuario.',
            'usuarios_id.integer' => 'El usuario seleccionado no es válido.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
        ];
    }
}
