<?php

namespace Database\Seeders;

use App\Models\Operador;
use Illuminate\Database\Seeder;

class OperadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Operador principal
        Operador::create([
            'name_operador' => 'João',
            'foto' => null,
            'color' => '#010101',
            'status_ativo' => 1,
            'local' => 'Arapiraca',
            'date_creation' => now(),
        ]);

        // Operadores aleatórios
        Operador::factory()
            ->count(10)
            ->ativo()
            ->create();
    }
}
