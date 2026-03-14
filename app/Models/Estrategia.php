<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    use HasFactory;

    protected $table = 'estrategias';

    public $timestamps = false;

    protected $fillable = [
        'op_mestre_a',
        'op_sec_a',
        'valor_mestre_a',
        'tipo_op_a',
        'variacao_a',
        'contas_mestre_a',
        'contas_sec_a',
        'op_mestre_b',
        'op_sec_b',
        'tipo_op_b',
        'contas_mestre_b',
        'contas_sec_b',
        'date_creation',
    ];

    protected $casts = [
        'contas_mestre_a' => 'array',
        'contas_sec_a' => 'array',
        'contas_mestre_b' => 'array',
        'contas_sec_b' => 'array',
        'date_creation' => 'datetime',
    ];
}
