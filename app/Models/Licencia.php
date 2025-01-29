<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Licencia extends Model
{
    use HasFactory;

    // Define la tabla en la base de datos
    protected $table = 'licencia';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombre',
        'codigo',
        'precio',
        'precio_mayorista',
        'precio_renovacion',
        'trasladable',
        'caducable',
        'formateable',
        'compra_asistida',
        'compartida',
        'marca_id',
        'categoria_id'
    ];

      // Define la clave primaria
    protected $primaryKey = 'id';

    // Hacer que el ID sea incremental
    public $incrementing = true;

    // Tipo de clave primaria (auto-increment es int)
    protected $keyType = 'int';

    public $timestamps = false;

    // Relaciones con otras tablas
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function comisiones()
    {
        return $this->hasMany(Comision::class, 'licencia_id');
    }
}
