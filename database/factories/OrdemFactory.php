<?php

namespace Database\Factories;

use App\Models\Ordem;
use App\Models\Conta;
use App\Models\Estrategia;
use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ordem>
 */
class OrdemFactory extends Factory
{
    protected $model = Ordem::class;

    public function definition(): array
    {
        return [
            'id_estrategy' => Estrategia::inRandomOrder()->first()->id ?? 1,
            'cod_operador' => Operador::inRandomOrder()->first()->id ?? 1,
            'id_conta' => Conta::inRandomOrder()->value('id_conta'),

    
            'grupo' => $this->faker->randomElement(['A', 'B']),
            'valor' => $this->faker->randomFloat(2, 10, 500),
            'tipo_negocio' => $this->faker->randomElement(['compra', 'venda']),
            'status' => $this->faker->randomElement(['aberta', 'executada', 'cancelada']),
            'visibility' => $this->faker->randomElement(['public', 'private']),
            'date_creation' => now(),
        ];
    }

}
