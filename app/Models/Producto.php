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
 * @property Categoria $categoria
 * @property Collection|Inventario[] $inventarios
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
		'Created_at',
		'Updated_at',
		'usuarios_id',  // FK → Usuario
		'categoria_id'  // FK → Categoria
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}

	public function inventarios()
	{
		return $this->hasMany(Inventario::class, 'ID_PRODUCTO');
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
