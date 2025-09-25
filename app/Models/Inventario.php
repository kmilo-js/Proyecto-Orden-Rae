<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $ID_INVENTARIO
 * @property int $ID_PRODUCTO
 * @property int $Cantidad
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * 
 * @property Usuario $usuario
 * @property Producto|null $producto
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	protected $primaryKey = 'ID_INVENTARIO';
	public $timestamps = true;

	const CREATED_AT = 'Created_at';
	const UPDATED_AT = 'Updated_at';

	protected $casts = [
		'ID_PRODUCTO' => 'int',
		'Cantidad' => 'int',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'ID_PRODUCTO',
		'Cantidad',
		'usuarios_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function producto()
	{
		return $this->hasOne(Producto::class, 'ID_PRODUCTO');
	}
}
