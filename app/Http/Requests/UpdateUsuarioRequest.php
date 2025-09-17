<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
        'Documento' => 'required|integer|unique:usuarios,Documento,' . $usuarioId . ',ID_USUARIO',
        'Correo_usuario' => 'required|email|unique:usuarios,Correo_usuario,' . $usuarioId . ',ID_USUARIO',
        'Telefono' => 'nullable|string|max:20',
        'roles_id' => 'required|exists:roles,ID_ROL',
        'Genero' => 'nullable|in:M,F,Otro',
        'Estado' => 'nullable|in:Activo,Inactivo',
    ];
    }
}
