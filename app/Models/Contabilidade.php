<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contabilidade extends Model
{
    protected $table = 'contabilidade';

    protected $fillable = [
        'data_lancamento',
        'periodo_competencia',
        'tipo_lancamento',
        'codigo_movimentacao',
        'codigo_conta',
        'classificacao_conta',
        'codigo_cc',
        'centro_custo',
        'descricao_lancamento',
        'detalhamento',
        'valor',
    ];
}
