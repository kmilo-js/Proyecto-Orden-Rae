<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $ID_PRODUCTO
 * @property string $Referencia_producto
 * @property string $Nombre_producto
 * @property string $Categoria_producto
 * @property string $Color_producto
 * @property int $Cantidad_producto
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * @property int $inventario_id
 * 
 * @property Usuario $usuario
 * @property Inventario $inventario
 * @property Collection|Pedido[] $pedidos
 * @property Collection|Produccion[] $produccions
 * @property Collection|ProductoHasVentum[] $producto_has_venta
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'producto';
	protected $primaryKey = 'ID_PRODUCTO';
	public $timestamps = false;

	protected $casts = [
		'Cantidad_producto' => 'int',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int',
		'inventario_id' => 'int'
	];

	protected $fillable = [
		'Referencia_producto',
		'Nombre_producto',
		'Categoria_producto',
		'Color_producto',
		'Cantidad_producto',
		'Created_at',
		'Updated_at',
		'usuarios_id',
		'inventario_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function inventario()
	{
		return $this->belongsTo(Inventario::class);
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'pedido_has_producto')
					->withPivot('ID_PEDIDO_PRODUCTO');
	}

	public function produccions()
	{
		return $this->hasMany(Produccion::class);
	}

	public function producto_has_venta()
	{
		return $this->hasMany(ProductoHasVentum::class);
	}
}
