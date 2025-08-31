<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VVenta
 * 
 * @property int $Documento
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Nombre_producto
 * @property string $Categoria_producto
 * @property string $Referencia_producto
 * @property int $fidelizacion_id
 * @property Carbon $Fecha_pago
 * @property Carbon $Hora_pago
 * @property string $Soporte_url
 * @property float $Total_pago
 *
 * @package App\Models
 */
class VVenta extends Model
{
	protected $table = 'v_ventas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Documento' => 'int',
		'fidelizacion_id' => 'int',
		'Fecha_pago' => 'datetime',
		'Hora_pago' => 'datetime',
		'Total_pago' => 'float'
	];

	protected $fillable = [
		'Documento',
		'Nombres',
		'Apellidos',
		'Nombre_producto',
		'Categoria_producto',
		'Referencia_producto',
		'fidelizacion_id',
		'Fecha_pago',
		'Hora_pago',
		'Soporte_url',
		'Total_pago'
	];
}
