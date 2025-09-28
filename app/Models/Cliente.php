<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente'; // nombre real de la tabla
    protected $primaryKey = 'cliente_id'; // la PK correcta
    public $timestamps = true;

    protected $fillable = [
        'Nombre_cliente',
        'Correo_cliente',
        'Telefono_cliente',
        'Direccion_cliente',
    ];

    // Relación con ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cliente_id', 'cliente_id');
    }
}
