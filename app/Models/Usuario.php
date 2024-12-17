<?php

namespace App\Models;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Auth\Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario'; 
    protected $fillable = ['correo', 'clave', 'rol']; 
=======

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $fillable = ['correo', 'clave', 'rol'];
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

    const CREATED_AT = 'fecha_creacion'; // Nombre personalizado para created_at
    const UPDATED_AT = 'fecha_actualizacion'; // Nombre personalizado para updated_at


     /**
     * Lista de permisos por rol
     */
    protected static $rolePermissions = [
        'administrador' => ['manage-users', 'manage-licenses', 'manage-inventory', 'manage-sales', 'manage-payments', 'view-reports'],
        'vendedor' => ['manage-sales', 'manage-payments'],
        'cliente' => ['manage-sales', 'manage-payments'],
    ];

    /**
     * Relación uno a muchos con Cliente.
     */
    public function clientes()
    {
        return $this->hasOne(Cliente::class, 'id_usuario');
    }

    /**
     * Relación uno a muchos con Vendedor.
     */
    public function vendedores()
    {
        return $this->hasOne(Vendedor::class, 'id_usuario');
    }

    public function getAuthIdentifierName()
    {
        return 'correo'; // Campo que se usará para identificar al usuario
    }

    public function getAuthPassword()
    {
        return $this->clave; // Retorna el campo 'clave' como contraseña
    }
    protected $hidden = ['clave', 'remember_token'];


    /**
     * Verifica si el usuario tiene un rol específico.
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            return in_array($this->rol, $roles);
        }
        return $this->rol === $roles;
    }


        /**
     * Verifica si el usuario tiene un permiso específico.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        $permissions = self::$rolePermissions[$this->rol] ?? [];
        return in_array($permission, $permissions);
<<<<<<< HEAD
    }   
=======
    }
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
}
