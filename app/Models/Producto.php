<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;

/**
 * Class Producto
 * 
 * @property int $ID_PRODUCTO
 * @property string $Codigo_producto
 * @property string $Referencia_producto
 * @property string $Color_producto
 * @property float $Precio_producto
 * @property string $Estado_producto
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * @property int $categoria_id
 * 
 * @property Usuario $usuario
 * @property Categoria $categorias
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
	public $timestamps = true;

	const CREATED_AT = 'Created_at';
	const UPDATED_AT = 'Updated_at';

	protected $casts = [
		'Precio_producto' => 'float',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int',
		'categoria_id' => 'int'
	];

	protected $fillable = [
		'Codigo_producto',
		'Referencia_producto',
		'Color_producto',
		'Precio_producto',
		'Estado_producto',
		'usuarios_id',
		'categoria_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function categorias()
	{
		return $this->belongsTo(Categorias::class, 'categoria_id');
	}

	public function inventario()
	{
		return $this->belongsTo(Inventario::class, 'ID_PRODUCTO');
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
