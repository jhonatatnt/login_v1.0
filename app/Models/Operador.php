<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operador extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nome da tabela
     */
    protected $table = 'operadores';

    /**
     * Chave primária customizada
     */
    protected $primaryKey = 'cod_operador';
    public $incrementing = false;
    protected $keyType = 'string';


    /**
     * Desativa timestamps padrão
     */
    public $timestamps = false;

    /**
     * Campos atribuíveis em massa
     */
    protected $fillable = [
        'cod_operador',
        'name_operador',
        'foto',
        'color',
        'status_ativo',
        'local',
        'date_creation',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'deleted_at' => 'datetime',
        'status_ativo' => 'integer',
        'date_creation' => 'datetime',
    ];

    /**
     * Gera automaticamente o código do operador (5 dígitos)
     */
    
    protected static function booted()
    {
        static::creating(function ($operador) {
            if (empty($operador->cod_operador)) {
                $ultimo = self::selectRaw('MAX(CAST(cod_operador AS UNSIGNED)) as max')
                    ->value('max') ?? 0;
    
                $operador->cod_operador = str_pad($ultimo + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }

}
