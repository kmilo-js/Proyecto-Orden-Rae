<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VRole
 * 
 * @property int $Documento
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Correo_usuario
 * @property string $Nombre_permisos
 * @property string $Descripcion_permisos
 * @property string $Cargo
 *
 * @package App\Models
 */
class VRole extends Model
{
	protected $table = 'v_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Documento' => 'int'
	];

	protected $fillable = [
		'Documento',
		'Nombres',
		'Apellidos',
		'Correo_usuario',
		'Nombre_permisos',
		'Descripcion_permisos',
		'Cargo'
	];
}
