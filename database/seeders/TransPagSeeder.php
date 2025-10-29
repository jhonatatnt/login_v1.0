<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransPagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transacoes_pagar')->insert([
            ['descricao' => 'Comprar Conta Finito', 'data' => '2025-07-10', 'status' => 'Pago', 'valor_pago' => 720.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Plataforma Wanderson', 'data' => '2025-07-12', 'status' => 'Pago', 'valor_pago' => 100.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Plataforma Jhonatan', 'data' => '2025-07-12', 'status' => 'Pago', 'valor_pago' => 100.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Plataforma Jhonatan', 'data' => '2025-07-12', 'status' => 'Pago', 'valor_pago' => 100.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Plataforma Vinicius', 'data' => '2025-07-14', 'status' => 'Pago', 'valor_pago' => 100.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Plataforma Jhonatan', 'data' => '2025-07-14', 'status' => 'Pago', 'valor_pago' => 100.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Licenca sistema', 'data' => '2025-07-15', 'status' => 'Aguardando Pagamento', 'valor_pago' => 500.00, 'valor_pendente' => 500.00],
            ['descricao' => 'Comprar Conta Finito', 'data' => '2025-07-15', 'status' => 'Aguardando Pagamento', 'valor_pago' => 720.00, 'valor_pendente' => 720.00],
            ['descricao' => 'Comprar Conta Welson', 'data' => '2025-07-15', 'status' => 'Pago', 'valor_pago' => 2800.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Wanderson', 'data' => '2025-07-20', 'status' => 'Aguardando Pagamento', 'valor_pago' => 2000.00, 'valor_pendente' => 2000.00],
            ['descricao' => 'Vanderson', 'data' => '2025-07-20', 'status' => 'Aguardando Pagamento', 'valor_pago' => 1500.00, 'valor_pendente' => 1500.00],
            ['descricao' => 'Bruna', 'data' => '2025-07-20', 'status' => 'Aguardando Pagamento', 'valor_pago' => 1000.00, 'valor_pendente' => 1000.00],
            ['descricao' => 'Vinicius', 'data' => '2025-07-20', 'status' => 'Pago', 'valor_pago' => 1000.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Kauan', 'data' => '2025-07-20', 'status' => 'Aguardando Pagamento', 'valor_pago' => 350.00, 'valor_pendente' => 350.00],
            ['descricao' => 'Jhonatan', 'data' => '2025-07-20', 'status' => 'Pago', 'valor_pago' => 1000.00, 'valor_pendente' => 0.00],
            ['descricao' => 'MEI Ivanilda', 'data' => '2025-07-20', 'status' => 'Pago', 'valor_pago' => 81.00, 'valor_pendente' => 0.00],
            ['descricao' => 'MEI Welson', 'data' => '2025-07-20', 'status' => 'Pago', 'valor_pago' => 81.00, 'valor_pendente' => 0.00],
            ['descricao' => 'Comprar Conta Kauan', 'data' => '2025-07-26', 'status' => 'Investimento Futuro (Analisando)', 'valor_pago' => 1500.00, 'valor_pendente' => 1500.00],
            ['descricao' => 'Comprar Conta Novas', 'data' => '2025-07-28', 'status' => 'Investimento Futuro (Analisando)', 'valor_pago' => 3000.00, 'valor_pendente' => 3000.00],
            ['descricao' => 'Comprar Conta Finito', 'data' => '2025-07-28', 'status' => 'Investimento Futuro (Analisando)', 'valor_pago' => 2880.00, 'valor_pendente' => 2880.00],
        ]);

    }
}
