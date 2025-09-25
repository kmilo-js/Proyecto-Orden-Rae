<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuariosController extends Controller
{
    public function index()
    {
        // Solo cargamos 'role' si lo vamos a mostrar en la vista
        $usuario = Usuario::with('role')
        ->orderBy('ID_USUARIO')->get();
        return view('usuario.index', compact('usuario'));
    }

    public function create()
    {
        $roles = Role::orderBy('Nombre_rol')->get(); // Usa el mismo campo que en edit()
        return view('usuario.create', compact('roles'));
    }

    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();
        // Asumimos que el campo en la BD se llama 'password' (estándar Laravel)
        $data['password'] = 'no-login-required';

        Usuario::create($data);

        return redirect()->route('usuario.index')->with('success', 'Usuario registrado exitosamente.');
    }

    public function edit(Usuario $usuario)
    {
        $roles = Role::orderBy('Nombre_rol')->get();
        return view('usuario.edit', compact('usuario', 'roles'));
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();
        // Mantenemos la contraseña existente (no se edita desde el formulario)
        $data['password'] = $usuario->password;

        $usuario->update($data);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('success', 'Usuario eliminado exitosamente'); 
            } 
        catch (\Throwable $e){
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
            }
        }
}