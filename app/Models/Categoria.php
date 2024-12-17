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
<<<<<<< HEAD
    
=======

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function licencias ()
    {
        return $this->hasMany(Licencia::class,'categoria_id');
    }
}
