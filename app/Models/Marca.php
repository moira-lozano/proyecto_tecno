<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;
    
    protected $table = 'marca';
    
    // Añade esta línea si no quieres que Laravel maneje automáticamente created_at y updated_at
    public $timestamps = false;
    
    protected $fillable = [ 'nombre' ];
    
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function licencias ()
    {
        return $this->hasMany(Licencia::class,'marca_id');
    }
}
