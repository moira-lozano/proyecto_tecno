<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'serie';

    protected $fillable = [
        'serie',
        'cantidad_equipos',
        'fecha_compra',
        'estado',
        'precio_compra',
        'duracion_cliente',
        'plazo_vencimiento',
        'licencia_id'
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    public function licencia()
    {
        return $this->belongsTo(Licencia::class, 'licencia_id');
    }

    public function activaciones()
    {
        return $this->hasMany(Activacion::class, 'serie_id');
    }
}
