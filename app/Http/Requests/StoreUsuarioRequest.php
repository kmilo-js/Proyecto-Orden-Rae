<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'Nombres' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Documento' => 'required|integer|unique:usuarios,Documento',
            'Correo_usuario' => 'required|email|unique:usuarios,Correo_usuario',
            'Telefono' => 'nullable|string|max:20', // si lo usas
            'roles_id' => 'required|exists:roles,ID_ROL', // asumiendo que tienes tabla roles
            'Genero' => 'nullable|in:M,F,Otro',
            'Estado' => 'nullable|in:Activo,Inactivo',
        ];
    }
    public function messages(): array
{
    return [
        'Nombres.required' => 'El nombre es obligatorio.',
        'Nombres.string' => 'El nombre debe ser una cadena de texto.',
        'Nombres.max' => 'El nombre no debe exceder los 255 caracteres.',
        'Apellidos.required' => 'El apellido es obligatorio.',
        'Apellidos.string' => 'El apellido debe ser una cadena de texto.',
        'Apellidos.max' => 'El apellido no debe exceder los 255 caracteres.',
        'Documento.required' => 'El documento es obligatorio.',
        'Documento.integer' => 'El documento debe ser un número entero.',
        'Documento.unique' => 'El documento ya está en uso.',
        'Correo_usuario.required' => 'El correo electrónico es obligatorio.',
        'Correo_usuario.email' => 'El correo electrónico debe ser una dirección válida.',
        'Correo_usuario.unique' => 'El correo electrónico ya está en uso.',
        'Telefono.string' => 'El teléfono debe ser una cadena de texto.',
        'Telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
        'roles_id.required' => 'El rol es obligatorio.',
        'roles_id.exists' => 'El rol seleccionado no es válido.',
        'Genero.in' => 'El género seleccionado no es válido.',
        'Estado.in' => 'El estado seleccionado no es válido.',
    ];
}
}
