<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activacion extends Model
{
    use HasFactory;

    protected $table = 'activacion';

    protected $fillable = [
        'detalle_nota',
        'cantidad_equipos',
        'precio_parcial',
        'renovacion',
        'serie_id',
        'notaventa_id'
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    public function notaVenta()
    {
        return $this->belongsTo(NotaVenta::class, 'notaventa_id');
    }
}
