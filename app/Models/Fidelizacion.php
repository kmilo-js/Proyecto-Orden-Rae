<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fidelizacion
 * 
 * @property int $ID_FIDELIZACION
 * @property Carbon $Fecha_de_fidelizacion
 * @property int $Total_de_producto
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * 
 * @property Usuario $usuario
 * @property Collection|Ventum[] $venta
 *
 * @package App\Models
 */
class Fidelizacion extends Model
{
	protected $table = 'fidelizacion';
	protected $primaryKey = 'ID_FIDELIZACION';
	public $timestamps = false;

	protected $casts = [
		'Fecha_de_fidelizacion' => 'datetime',
		'Total_de_producto' => 'int',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'Fecha_de_fidelizacion',
		'Total_de_producto',
		'Created_at',
		'Updated_at',
		'usuarios_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function venta()
	{
		return $this->hasMany(Ventum::class);
	}
}
