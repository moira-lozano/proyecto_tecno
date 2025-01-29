<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Auth\Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario'; 

    protected $fillable = [
        'correo',
        'clave',
        'rol',
        'fecha_actualizacion',
        'fecha_creacion',
    ];

    public $timestamps = false;

    protected $hidden = ['clave'];  // Oculta la clave en las respuestas JSON
    
    protected $casts = [
        'fecha_actualizacion' => 'datetime',
        'fecha_creacion' => 'datetime',
    ];


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

    public function getAuthIdentifier()
    {
        return $this->id; // Laravel usará 'id' en la sesión en lugar de 'correo'
    }
    
    public function getAuthPassword()
    {
        return $this->clave; // Retorna el campo 'clave' como contraseña
    }

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
    }   
}
