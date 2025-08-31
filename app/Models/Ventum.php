<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 * 
 * @property int $ID_VENTA
 * @property string $Nombre_producto
 * @property string $Categoria_producto
 * @property string $Color_producto
 * @property int $pedido_id
 * @property int $fidelizacion_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Fidelizacion $fidelizacion
 * @property Pedido $pedido
 * @property Collection|ProductoHasVentum[] $producto_has_venta
 * @property Collection|SoportePago[] $soporte_pagos
 * @property Collection|VentaHasUsuario[] $venta_has_usuarios
 *
 * @package App\Models
 */
class Ventum extends Model
{
	protected $table = 'venta';
	protected $primaryKey = 'ID_VENTA';

	protected $casts = [
		'pedido_id' => 'int',
		'fidelizacion_id' => 'int'
	];

	protected $fillable = [
		'Nombre_producto',
		'Categoria_producto',
		'Color_producto',
		'pedido_id',
		'fidelizacion_id'
	];

	public function fidelizacion()
	{
		return $this->belongsTo(Fidelizacion::class);
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class);
	}

	public function producto_has_venta()
	{
		return $this->hasMany(ProductoHasVentum::class, 'venta_id');
	}

	public function soporte_pagos()
	{
		return $this->hasMany(SoportePago::class, 'venta_id');
	}

	public function venta_has_usuarios()
	{
		return $this->hasMany(VentaHasUsuario::class, 'venta_id');
	}
}
