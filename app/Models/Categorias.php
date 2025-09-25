<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $ID_CATEGORIA
 * @property string $Nombre_categoria
 * @property string $Estado_categoria
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Categorias extends Model
{
	protected $table = 'categorias';
	protected $primaryKey = 'ID_CATEGORIA';
	public $timestamps = false;

	protected $fillable = [
		'Nombre_categoria',
		'Estado_categoria'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class);
	}
}