<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VUsuario
 * 
 * @property int $ID_USUARIO
 * @property string $Nombres
 * @property string $Apellidos
 * @property int $Documento
 * @property string $Correo_usuario
 * @property string $Estado_pedido
 * @property Carbon $Fecha_de_compra
 * @property Carbon $Fecha_de_entrega
 * @property int $Total_de_pago
 * @property string $Nombre_producto
 * @property Carbon $created_at
 * @property int $pedido_id
 *
 * @package App\Models
 */
class VUsuario extends Model
{
	protected $table = 'v_usuarios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_USUARIO' => 'int',
		'Documento' => 'int',
		'Fecha_de_compra' => 'datetime',
		'Fecha_de_entrega' => 'datetime',
		'Total_de_pago' => 'int',
		'pedido_id' => 'int'
	];

	protected $fillable = [
		'ID_USUARIO',
		'Nombres',
		'Apellidos',
		'Documento',
		'Correo_usuario',
		'Estado_pedido',
		'Fecha_de_compra',
		'Fecha_de_entrega',
		'Total_de_pago',
		'Nombre_producto',
		'pedido_id'
	];
}
