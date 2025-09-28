<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoHasVentum extends Model
{
    protected $table = 'producto_has_venta';
    protected $primaryKey = 'ID_PRODUCTO_HAS_VENTA';
    public $timestamps = false;

    protected $casts = [
        'ID_VENTA' => 'int',
        'ID_PRODUCTO' => 'int',
        'cantidad' => 'int',
        'precio_unitario' => 'float'
    ];

    protected $fillable = [
        'ID_VENTA',
        'ID_PRODUCTO',
        'cantidad',
        'precio_unitario'  // 👈 ¡Este campo debe existir en tu BD!
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_VENTA');
    }
}