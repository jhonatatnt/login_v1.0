<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contabilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        DB::table('contabilidade')->insert([
            [
                'data_lancamento' => '2025-07-09',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'CAI001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Saldo Inicial em Caixa',
                'codigo_cc' => 'CC000',
                'centro_custo' => 'Financeiro Geral',
                'descricao_lancamento' => 'Saldo inicial disponível em caixa da empresa',
                'detalhamento' => 'Saldo de Abertura',
                'valor' => 4584.89
            ],
            [
                'data_lancamento' => '2025-07-10',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES003',
                'codigo_conta' => '2.02.07',
                'classificacao_conta' => 'Despesas Operacionais Diretas',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Compra de conta',
                'detalhamento' => 'Compra de conta Finito',
                'valor' => -720.00
            ],
            [
                'data_lancamento' => '2025-07-11',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000011 - 58.744.500',
                'valor' => 1951.72
            ],
            [
                'data_lancamento' => '2025-07-11',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000018 - 58.408.759',
                'valor' => 2565.39
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES001',
                'codigo_conta' => '2.02.03',
                'classificacao_conta' => 'Despesa com Plataforma',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Pagamento plataforma',
                'detalhamento' => 'Plataforma Usuário Jhonatan',
                'valor' => -100.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES001',
                'codigo_conta' => '2.02.03',
                'classificacao_conta' => 'Despesa com Plataforma',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Pagamento plataforma',
                'detalhamento' => 'Plataforma Usuário Jhonatan',
                'valor' => -100.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES001',
                'codigo_conta' => '2.02.03',
                'classificacao_conta' => 'Despesa com Plataforma',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Pagamento plataforma',
                'detalhamento' => 'Plataforma Usuário Wanderson',
                'valor' => -100.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Vinicius',
                'valor' => -1000.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Jhonatan',
                'valor' => -1000.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES004',
                'codigo_conta' => '2.01.01',
                'classificacao_conta' => 'Tributos e Encargos MEI',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento mensal do MEI',
                'detalhamento' => 'MEI Ivanilda',
                'valor' => -81.00
            ],
            [
                'data_lancamento' => '2025-07-12',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES004',
                'codigo_conta' => '2.01.01',
                'classificacao_conta' => 'Tributos e Encargos MEI',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento mensal do MEI',
                'detalhamento' => 'MEI Welson',
                'valor' => -81.00
            ],
            [
                'data_lancamento' => '2025-07-14',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES001',
                'codigo_conta' => '2.02.03',
                'classificacao_conta' => 'Despesa com Plataforma',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Pagamento plataforma',
                'detalhamento' => 'Plataforma Usuário Jhonatan',
                'valor' => -100.00
            ],
            [
                'data_lancamento' => '2025-07-14',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES001',
                'codigo_conta' => '2.02.03',
                'classificacao_conta' => 'Despesa com Plataforma',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Pagamento plataforma',
                'detalhamento' => 'Plataforma Usuário Vinicius',
                'valor' => -100.00
            ],
            [
                'data_lancamento' => '2025-07-15',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES003',
                'codigo_conta' => '2.02.07',
                'classificacao_conta' => 'Despesas Operacionais Diretas',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Compra de conta',
                'detalhamento' => 'Compra de conta Finito',
                'valor' => -720.00
            ],
            [
                'data_lancamento' => '2025-07-15',
                'periodo_competencia' => 'jul/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES003',
                'codigo_conta' => '2.02.07',
                'classificacao_conta' => 'Despesas Operacionais Diretas',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Compra de conta - Ajuste Erro Operacional',
                'detalhamento' => 'Correção de Erro Operacional',
                'valor' => -2800.00
            ],
            [
                'data_lancamento' => '2025-07-20',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000004 - 60.685.700',
                'valor' => 2688.00
            ],
            [
                'data_lancamento' => '2025-07-20',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000005 - 60.685.700',
                'valor' => 2688.00
            ],
            [
                'data_lancamento' => '2025-07-20',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000019 - 58.408.759',
                'valor' => 1699.46
            ],
            [
                'data_lancamento' => '2025-07-21',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? ARKADI',
                'detalhamento' => 'NFS 2025/000009 - 58.672.901',
                'valor' => 5357.96
            ],
            [
                'data_lancamento' => '2025-07-21',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Wanderson',
                'valor' => -2000.00
            ],
            [
                'data_lancamento' => '2025-07-21',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Vanderson',
                'valor' => -1500.00
            ],
            [
                'data_lancamento' => '2025-07-21',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Bruna',
                'valor' => -1000.00
            ],
            [
                'data_lancamento' => '2025-07-21',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Despesa (-)',
                'codigo_movimentacao' => 'DES002',
                'codigo_conta' => '2.02.05',
                'classificacao_conta' => 'Serviços de Terceiros',
                'codigo_cc' => 'CC002',
                'centro_custo' => 'Administrativo Financeiro',
                'descricao_lancamento' => 'Pagamento de prestação de serviço',
                'detalhamento' => 'Kauan',
                'valor' => -350.00
            ],
            [
                'data_lancamento' => '2025-07-25',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000020 - 58.408.759',
                'valor' => 3882.82
            ],
            [
                'data_lancamento' => '2025-07-25',
                'periodo_competencia' => 'jun/25',
                'tipo_lancamento' => 'Receita (+)',
                'codigo_movimentacao' => 'REC001',
                'codigo_conta' => '1.01.01',
                'classificacao_conta' => 'Receita Operacional',
                'codigo_cc' => 'CC001',
                'centro_custo' => 'Operacional',
                'descricao_lancamento' => 'Recebimento NFS ? MIDE',
                'detalhamento' => 'NFS 2025/000010 - 58.672.901',
                'valor' => 997.63
            ]
        ]);
    }
}


        
