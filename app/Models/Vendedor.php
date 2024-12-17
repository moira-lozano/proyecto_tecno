<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedor';
    protected $fillable = ['nombre', 'id_usuario'];

    /**
     * Relación muchos a uno con Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
