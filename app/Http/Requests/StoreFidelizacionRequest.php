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
            'Puntos_acumulados' => 'required|integer|min:0',
            'Nivel_fidelizacion' => 'nullable|string|max:50',
            'usuarios_id' => 'required|integer|exists:usuarios,ID_USUARIO',
        ];
    }

    public function messages()
    {
        return [
            'Fecha_de_fidelizacion.required' => 'La fecha de fidelización es obligatoria.',
            'Fecha_de_fidelizacion.date' => 'La fecha de fidelización no es válida.',
            'Puntos_acumulados.required' => 'Los puntos acumulados son obligatorios.',
            'Puntos_acumulados.integer' => 'Los puntos acumulados deben ser un número entero.',
            'Puntos_acumulados.min' => 'Los puntos acumulados no pueden ser negativos.',
            'Nivel_fidelizacion.string' => 'El nivel de fidelización debe ser una cadena de texto.',
            'Nivel_fidelizacion.max' => 'El nivel de fidelización no puede exceder los 50 caracteres.',
            'usuarios_id.required' => 'Debe seleccionar un usuario.',
            'usuarios_id.integer' => 'El usuario seleccionado no es válido.',
            'usuarios_id.exists' => 'El usuario asignado no existe.',
        ];
    }
}
