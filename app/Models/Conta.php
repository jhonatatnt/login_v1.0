<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contas';

    protected $primaryKey = 'id_conta';

    public $timestamps = false;

    protected $fillable = [
        'conta',
        'qtd_contrato',
        'login_email',
        'login_senha',
        'senha_operacao',
        'valor_ganho',
        'valor_perda',
        'status_conta',
        'date_creation',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'qtd_contrato' => 'integer',
        'valor_ganho' => 'decimal:2',
        'valor_perda' => 'decimal:2',
        'date_creation' => 'datetime',
    ];
}
