<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransRecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transacoes_receber')->insert([
        [
            'corretora' => 'MIDE',
            'conta' => '587******',
            'usuario' => 'Wanderson',
            'valor_receber' => 2560.00,
            'valor_faturado' => 4000.00,
            'valor_impostos' => 1440.00,
            'data_recebimento' => '2025-07-11',
            'status' => 'Pago',
            'ativo' => 'Dolar',
            'tipo_conta' => 'SR',
            'situacao' => 'ok',
            'ordem' => 5
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '148******',
            'usuario' => 'Ivanilda',
            'valor_receber' => 1952.00,
            'valor_faturado' => 3050.00,
            'valor_impostos' => 1098.00,
            'data_recebimento' => '2025-07-11',
            'status' => 'Pago',
            'ativo' => 'Dolar',
            'tipo_conta' => 'SR',
            'situacao' => 'ok',
            'ordem' => 5
        ],
        [
            'corretora' => 'ARKADI',
            'conta' => '491******',
            'usuario' => 'Vanderson',
            'valor_receber' => 5360.00,
            'valor_faturado' => 8000.00,
            'valor_impostos' => 2640.00,
            'data_recebimento' => '2025-07-18',
            'status' => 'Aguardando Lançamento',
            'ativo' => 'indice',
            'tipo_conta' => 'SR',
            'situacao' => 'ok',
            'ordem' => 2
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '777***501',
            'usuario' => 'Jhonatan',
            'valor_receber' => 2688.00,
            'valor_faturado' => 4200.00,
            'valor_impostos' => 1512.00,
            'data_recebimento' => '2025-07-20',
            'status' => 'Solicitação Realizada',
            'ativo' => 'indice',
            'tipo_conta' => 'SRC',
            'situacao' => 'ok',
            'ordem' => 1
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '153***284',
            'usuario' => 'Jhonatan',
            'valor_receber' => 2688.00,
            'valor_faturado' => 4200.00,
            'valor_impostos' => 1512.00,
            'data_recebimento' => '2025-07-20',
            'status' => 'Solicitação Realizada',
            'ativo' => 'indice',
            'tipo_conta' => 'SRC',
            'situacao' => 'ok',
            'ordem' => 1
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '215******',
            'usuario' => 'Wanderson',
            'valor_receber' => 1696.00,
            'valor_faturado' => 2650.00,
            'valor_impostos' => 954.00,
            'data_recebimento' => '2025-07-20',
            'status' => 'Solicitação Realizada',
            'ativo' => 'indice',
            'tipo_conta' => 'SR',
            'situacao' => 'ok',
            'ordem' => 5
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '777***501',
            'usuario' => 'Jhonatan',
            'valor_receber' => 2073.60,
            'valor_faturado' => 3240.00,
            'valor_impostos' => 1166.40,
            'data_recebimento' => '2025-07-30',
            'status' => 'Enviar solicitação',
            'ativo' => 'indice',
            'tipo_conta' => 'SRC',
            'situacao' => 'ok',
            'ordem' => 6
        ],
        [
            'corretora' => 'MIDE',
            'conta' => '153***284',
            'usuario' => 'Jhonatan',
            'valor_receber' => 2254.08,
            'valor_faturado' => 3522.00,
            'valor_impostos' => 1267.92,
            'data_recebimento' => '2025-07-30',
            'status' => 'Enviar solicitação',
            'ativo' => 'indice',
            'tipo_conta' => 'SRC',
            'situacao' => 'ok',
            'ordem' => 6
        ],
        [
            'corretora' => 'AMIGOS DA MESA',
            'conta' => null,
            'usuario' => null,
            'valor_receber' => 12600.00,
            'valor_faturado' => 18000.00,
            'valor_impostos' => null,
            'data_recebimento' => '2025-07-30',
            'status' => 'Em operação',
            'ativo' => 'indice',
            'tipo_conta' => 'SRC',
            'situacao' => null,
            'ordem' => 3
        ],
        [
            'corretora' => 'MIDE',
            'conta' => null,
            'usuario' => null,
            'valor_receber' => 3200.00,
            'valor_faturado' => 5000.00,
            'valor_impostos' => null,
            'data_recebimento' => '2025-07-30',
            'status' => 'Em operação',
            'ativo' => 'Dolar',
            'tipo_conta' => 'SR',
            'situacao' => null,
            'ordem' => 5
        ],
        [
            'corretora' => 'MIDE',
            'conta' => null,
            'usuario' => null,
            'valor_receber' => 2560.00,
            'valor_faturado' => 4000.00,
            'valor_impostos' => null,
            'data_recebimento' => '2025-07-30',
            'status' => 'Em operação',
            'ativo' => 'Dolar',
            'tipo_conta' => 'SR',
            'situacao' => null,
            'ordem' => 5
        ]
    ]);

    }
}
