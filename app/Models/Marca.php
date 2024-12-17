<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

class Marca extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
    protected $table = 'marca';
    
    // Añade esta línea si no quieres que Laravel maneje automáticamente created_at y updated_at
    public $timestamps = false;
    
    protected $fillable = [ 'nombre' ];
    
=======

    protected $table = 'marca';

    // Añade esta línea si no quieres que Laravel maneje automáticamente created_at y updated_at
    public $timestamps = false;

    protected $fillable = [ 'nombre' ];

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function licencias ()
    {
        return $this->hasMany(Licencia::class,'marca_id');
    }
}
