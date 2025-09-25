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
 * @property int $Puntos_acumulados
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * @property string|null $Nivel_fidelizacion
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
	public $timestamps = true;

	const CREATED_AT = 'Created_at';
	const UPDATED_AT = 'Updated_at';

	protected $casts = [
		'Fecha_de_fidelizacion' => 'datetime',
		'Puntos_acumulados' => 'int',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'Fecha_de_fidelizacion',
		'Puntos_acumulados',
		'usuarios_id',
		'Nivel_fidelizacion'
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
