<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductoHasVentum
 * 
 * @property int $ID_PRODUCTO_HAS_VENTA
 * @property int $venta_id
 * @property int $producto_id
 * 
 * @property Producto $producto
 * @property Ventum $ventum
 *
 * @package App\Models
 */
class ProductoHasVentum extends Model
{
	protected $table = 'producto_has_venta';
	protected $primaryKey = 'ID_PRODUCTO_HAS_VENTA';
	public $timestamps = false;

	protected $casts = [
		'venta_id' => 'int',
		'producto_id' => 'int'
	];

	protected $fillable = [
		'venta_id',
		'producto_id'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class);
	}

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'venta_id');
	}
}
