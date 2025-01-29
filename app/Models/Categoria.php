<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    // Define la tabla en la base de datos
    protected $table = 'categoria';

    // Campos permitidos para asignación masiva
    protected $fillable = [ 'nombre' ];

    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function licencias ()
    {
        return $this->hasMany(Licencia::class,'categoria_id');
    }
}
