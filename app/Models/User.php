<?php

namespace App\Models;

use App\Helpers\CustomValidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CustomValidate;

    /**
     * Nome da tabela
     */
    protected $table = 'users';

    /**
     * Chave primária customizada
     */
    protected $primaryKey = 'id_user';

    /**
     * Desativa timestamps padrão
     */
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | Constantes de Roles
    |--------------------------------------------------------------------------
    */

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_SUPER_ADMIN = 3;

    /**
     * Atributos atribuíveis em massa
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'confirm_email',
        'role_user',
        'date_creation',
        'remember_token',
    ];

    /**
     * Atributos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'date_creation' => 'datetime',
            'password' => 'hashed',
            'role_user' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers de Permissão
    |--------------------------------------------------------------------------
    */

    public function isUser(): bool
    {
        return $this->role_user === self::ROLE_USER;
    }

    public function isAdmin(): bool
    {
        return in_array($this->role_user, [
            self::ROLE_ADMIN,
            self::ROLE_SUPER_ADMIN
        ]);
    }

    public function isSuperAdmin(): bool
    {
        return $this->role_user === self::ROLE_SUPER_ADMIN;
    }
}