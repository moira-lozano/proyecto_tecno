<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

<<<<<<< HEAD
=======

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
class Comision extends Model
{
    use HasFactory;

    // Define la tabla en la base de datos
    protected $table = 'comision';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'porcentaje_comision',
        'licencia_id',
        'vendedor_id',
    ];

      // Define la clave primaria
    protected $primaryKey = 'id';

    // Hacer que el ID sea incremental
    public $incrementing = true;

    // Tipo de clave primaria (auto-increment es int)
    protected $keyType = 'int';

    public $timestamps = false;

    // Relaciones con otras tablas
    public function licencia()
    {
        return $this->belongsTo(Licencia::class, 'licencia_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }
}
