<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoHasProducto
 * 
 * @property int $ID_PEDIDO_PRODUCTO
 * @property int $pedido_id
 * @property int $producto_id
 * 
 * @property Producto $producto
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class PedidoHasProducto extends Model
{
	protected $table = 'pedido_has_producto';
	protected $primaryKey = 'ID_PEDIDO_PRODUCTO';
	public $timestamps = false;

	protected $casts = [
		'pedido_id' => 'int',
		'producto_id' => 'int'
	];

	protected $fillable = [
		'pedido_id',
		'producto_id'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class);
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class);
	}
}
