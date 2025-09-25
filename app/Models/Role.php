<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $ID_ROL
 * @property string $Nombre_rol
 * 
 * @property Usuario $usuario
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'ID_ROL';
	public $timestamps = false;

	protected $fillable = [
		'Nombre_rol'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'roles_id');
	}

	public function permisos()
	{
		return $this->belongsToMany(Permiso::class, 'permisos_has_roles', 'roles_id', 'permisos_id')
					->withPivot('ID_PERMISOS_ROL');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'roles_id');
	}
}
