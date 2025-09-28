<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'ID_VENTA';
    public $timestamps = false;

    protected $casts = [
        'Fecha_venta' => 'datetime',
        'Total_venta' => 'float',
        'pedido_id' => 'int',
        'fidelizacion_id' => 'int'
    ];

    protected $fillable = [
        'Fecha_venta',
        'Total_venta',
        'Estado_venta',
        'pedido_id',
        'fidelizacion_id',
        'cliente_id',
    ];

    public function detalles()
    {
        return $this->hasMany(ProductoHasVentum::class, 'ID_VENTA');
    }

    /*public function pedido()
	{
    return $this->belongsTo(Pedido::class, 'pedido_id', 'ID_PEDIDO');
	}

	public function fidelizacion()
	{
    return $this->belongsTo(Fidelizacion::class, 'fidelizacion_id', 'ID_FIDELIZACION');
	}
	*/
    public function soporte_pagos()
    {
        return $this->hasMany(SoportePago::class, 'venta_id');
    }

    public function venta_has_usuarios()
    {
        return $this->hasMany(VentaHasUsuario::class, 'venta_id');
    }

    public function cliente()
	{
    return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
	}

	public function getClienteNombreAttribute()
	{
    return $this->cliente ? $this->cliente->nombres . ' ' . $this->cliente->apellidos : '-';
	}

	public function getTiempoEntregaAttribute()
    {
        $map = [
            1 => '1 día',
            2 => '8 días',
            3 => '15 días',
            4 => '20 días',
            5 => '60 días',
        ];
        return $map[$this->pedido_id] ?? '-';
    }

    public function getTipoClienteAttribute()
    {
        $map = [
            1 => 'Final',
            2 => 'Frecuente',
            3 => 'Mayorista',
        ];
        return $map[$this->fidelizacion_id] ?? '-';
    }
}