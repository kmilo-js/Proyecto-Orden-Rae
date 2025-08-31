<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $ID_PERMISOS
 * @property string $Nombre_permisos
 * @property string $Descripcion_permisos
 * 
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'ID_PERMISOS';
	public $timestamps = false;

	protected $fillable = [
		'Nombre_permisos',
		'Descripcion_permisos'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'permisos_has_roles', 'permisos_id', 'roles_id')
					->withPivot('ID_PERMISOS_ROL');
	}
}
