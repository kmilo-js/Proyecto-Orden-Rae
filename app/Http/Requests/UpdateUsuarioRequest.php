<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $usuarioId = $this->route('usuario'); // ← Corrección clave

        $usuario = $this->route('usuario');

        return [
            'Nombres' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Documento' => [
                'required',
                'integer',
                Rule::unique('usuarios', 'Documento')->ignore($usuario->ID_USUARIO, 'ID_USUARIO')
            ],
            'Correo_usuario' => [
                'required',
                'email',
                Rule::unique('usuarios', 'Correo_usuario')->ignore($usuario->ID_USUARIO, 'ID_USUARIO')
            ],
            'Telefono' => 'nullable|string|max:20',
            'roles_id' => 'required|exists:roles,ID_ROL',
            'Genero' => 'nullable|in:M,F,Otro',
            'Estado' => 'nullable|in:Activo,Inactivo',
        ];
    }
}