<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotaVenta extends Model
{
    use HasFactory;

    protected $table = 'notaventa';

    protected $fillable = [
        'fecha',
        'monto_total',
        'comision_pagada',
        'cliente_id',
        'vendedor_id'
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }

    public function activaciones()
    {
        return $this->hasMany(Activacion::class, 'notaventa_id');
    }
}
