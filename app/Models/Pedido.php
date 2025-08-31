<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $ID_PEDIDO
 * @property Carbon $Fecha_de_compra
 * @property Carbon $Fecha_de_entrega
 * @property int $Total_de_pago
 * @property string $Estado_pedido
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * 
 * @property Collection|Producto[] $productos
 * @property Collection|Usuario[] $usuarios
 * @property Collection|Ventum[] $venta
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'ID_PEDIDO';
	public $timestamps = false;

	protected $casts = [
		'Fecha_de_compra' => 'datetime',
		'Fecha_de_entrega' => 'datetime',
		'Total_de_pago' => 'int',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime'
	];

	protected $fillable = [
		'Fecha_de_compra',
		'Fecha_de_entrega',
		'Total_de_pago',
		'Estado_pedido',
		'Created_at',
		'Updated_at'
	];

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'pedido_has_producto')
					->withPivot('ID_PEDIDO_PRODUCTO');
	}

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuarios_has_pedido', 'pedido_id', 'usuarios_id')
					->withPivot('ID_PEDIDO_CLIENTE');
	}

	public function venta()
	{
		return $this->hasMany(Ventum::class);
	}
}
