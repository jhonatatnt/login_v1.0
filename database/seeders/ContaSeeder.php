<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conta;
use Illuminate\Support\Facades\Hash;

class ContaSeeder extends Seeder
{
    public function run(): void
    {
        // Registro fixo
        Conta::create([
            'conta' => '114***247',
            'qtd_contrato' => 20,
            'login_email' => 'user@email.com',
            'login_senha' => Hash::make('123123'),
            'senha_operacao' => Hash::make('123123'),
            'valor_ganho' => 1000,
            'valor_perda' => 1000,
            'status_conta' => 'ativo',
            'date_creation' => now(),
        ]);

        // Registros fake
        Conta::factory()->count(5)->create();
    }
}
