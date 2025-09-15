<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'ID_USUARIO';
    public $timestamps = false;

    protected $casts = [
        'Documento' => 'int',
        'Created_at' => 'datetime',
        'Updated_at' => 'datetime',
        'roles_id' => 'int'
    ];

    protected $fillable = [
        'Nombres',
        'Apellidos',
        'Documento',
        'Correo_usuario',
        'Contrase_usuario',
        'Genero',
        'Telefono',
        'Estado',
        'Created_at',
        'Updated_at',
        'roles_id'
    ];

    // Relaciones
    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'ID_ROL');
    }

    public function fidelizacion()
    {
        return $this->hasMany(Fidelizacion::class, 'usuarios_id', 'ID_USUARIO');
    }

    public function inventario()
    {
        return $this->hasMany(Inventario::class, 'usuarios_id', 'ID_USUARIO');
    }

    public function produccion()
    {
        return $this->hasMany(Produccion::class, 'usuarios_id', 'ID_USUARIO');
    }

    public function producto()
    {
        return $this->hasMany(Producto::class, 'usuarios_id', 'ID_USUARIO');
    }

    public function soportePago()
    {
        return $this->hasMany(SoportePago::class, 'usuarios_id', 'ID_USUARIO');
    }

    public function pedido()
    {
        return $this->belongsToMany(Pedido::class, 'usuarios_has_pedido', 'usuarios_id', 'pedido_id')
                    ->withPivot('ID_PEDIDO_CLIENTE');
    }

    public function ventahasusuario()
    {
        return $this->hasMany(VentaHasUsuario::class, 'usuarios_id', 'ID_USUARIO');
    }
}

