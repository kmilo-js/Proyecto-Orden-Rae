<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $ID_INVENTARIO
 * @property string $Referencia_producto
 * @property string $Categoria_producto
 * @property string $Color_producto
 * @property string $Cantidad_producto
 * @property string $Estado_producto
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * 
 * @property Usuario $usuario
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	protected $primaryKey = 'ID_INVENTARIO';
	public $timestamps = false;

	protected $casts = [
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'Referencia_producto',
		'Categoria_producto',
		'Color_producto',
		'Cantidad_producto',
		'Estado_producto',
		'Created_at',
		'Updated_at',
		'usuarios_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class);
	}
}
