<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermisosHasRole
 * 
 * @property int $ID_PERMISOS_ROL
 * @property int $permisos_id
 * @property int $roles_id
 * 
 * @property Role $role
 * @property Permiso $permiso
 *
 * @package App\Models
 */
class PermisosHasRole extends Model
{
	protected $table = 'permisos_has_roles';
	protected $primaryKey = 'ID_PERMISOS_ROL';
	public $timestamps = false;

	protected $casts = [
		'permisos_id' => 'int',
		'roles_id' => 'int'
	];

	protected $fillable = [
		'permisos_id',
		'roles_id'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'roles_id');
	}

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'permisos_id');
	}
}
