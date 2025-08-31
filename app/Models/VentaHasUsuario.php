<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VentaHasUsuario
 * 
 * @property int $ID_VENTA_ASESOR
 * @property int $venta_id
 * @property int $usuarios_id
 * 
 * @property Ventum $ventum
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class VentaHasUsuario extends Model
{
	protected $table = 'venta_has_usuarios';
	protected $primaryKey = 'ID_VENTA_ASESOR';
	public $timestamps = false;

	protected $casts = [
		'venta_id' => 'int',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'venta_id',
		'usuarios_id'
	];

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'venta_id');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}
}
