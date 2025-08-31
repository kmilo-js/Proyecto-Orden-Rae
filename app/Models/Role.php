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
 * @property string $Cargo
 * 
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'ID_ROL';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_ROL' => 'int'
	];

	protected $fillable = [
		'Cargo'
	];

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
