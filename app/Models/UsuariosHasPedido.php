<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosHasPedido
 * 
 * @property int $ID_PEDIDO_CLIENTE
 * @property int $pedido_id
 * @property int $usuarios_id
 * 
 * @property Pedido $pedido
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class UsuariosHasPedido extends Model
{
	protected $table = 'usuarios_has_pedido';
	protected $primaryKey = 'ID_PEDIDO_CLIENTE';
	public $timestamps = false;

	protected $casts = [
		'pedido_id' => 'int',
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'pedido_id',
		'usuarios_id'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id');
	}
}
