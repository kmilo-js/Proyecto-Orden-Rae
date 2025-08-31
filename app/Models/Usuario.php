<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $ID_USUARIO
 * @property string $Nombres
 * @property string $Apellidos
 * @property int $Documento
 * @property string $Correo_usuario
 * @property string $Contrase_usuario
 * @property string $Genero
 * @property string $Telefono
 * @property string $Estado
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $roles_id
 * 
 * @property Role $role
 * @property Collection|Fidelizacion[] $fidelizacions
 * @property Collection|Inventario[] $inventarios
 * @property Collection|Produccion[] $produccions
 * @property Collection|Producto[] $productos
 * @property Collection|SoportePago[] $soporte_pagos
 * @property Collection|Pedido[] $pedidos
 * @property Collection|VentaHasUsuario[] $venta_has_usuarios
 *
 * @package App\Models
 */
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

	public function role()
	{
		return $this->belongsTo(Role::class, 'roles_id');
	}

	public function fidelizacions()
	{
		return $this->hasMany(Fidelizacion::class, 'usuarios_id');
	}

	public function inventarios()
	{
		return $this->hasMany(Inventario::class, 'usuarios_id');
	}

	public function produccions()
	{
		return $this->hasMany(Produccion::class, 'usuarios_id');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'usuarios_id');
	}

	public function soporte_pagos()
	{
		return $this->hasMany(SoportePago::class, 'usuarios_id');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'usuarios_has_pedido', 'usuarios_id')
					->withPivot('ID_PEDIDO_CLIENTE');
	}

	public function venta_has_usuarios()
	{
		return $this->hasMany(VentaHasUsuario::class, 'usuarios_id');
	}
}
