<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SoportePago
 * 
 * @property int $ID_SOPORTE_PAGO
 * @property Carbon $Hora_pago
 * @property Carbon $Fecha_pago
 * @property float $Total_pago
 * @property string $Soporte_url
 * @property Carbon $Created_at
 * @property Carbon $Updated_at
 * @property int $usuarios_id
 * @property int $venta_id
 * 
 * @property Usuario $usuario
 * @property Ventum $ventum
 *
 * @package App\Models
 */
class SoportePago extends Model
{
	protected $table = 'soporte_pago';
	protected $primaryKey = 'ID_SOPORTE_PAGO';
	public $timestamps = false;

	protected $casts = [
		'Hora_pago' => 'datetime',
		'Fecha_pago' => 'datetime',
		'Total_pago' => 'float',
		'Created_at' => 'datetime',
		'Updated_at' => 'datetime',
		'usuarios_id' => 'int',
		'venta_id' => 'int'
	];

	protected $fillable = [
		'Hora_pago',
		'Fecha_pago',
		'Total_pago',
		'Soporte_url',
		'Created_at',
		'Updated_at',
		'usuarios_id',
		'venta_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'venta_id');
	}
}
