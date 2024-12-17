<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $fillable = [
        'nombre', 'ci', 'nit', 'correo', 'empresa',
        'cod_pais1', 'celular1', 'cod_pais2', 'celular2', 'id_usuario'
    ];

    /**
     * Relación muchos a uno con Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
<<<<<<< HEAD

=======
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
}
