<?php

namespace Database\Factories;

use App\Models\Estrategia;
use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Estrategia>
 */
class EstrategiaFactory extends Factory
{
    protected $model = Estrategia::class;

    public function definition(): array
    {
        $operadores = Operador::pluck('cod_operador')->toArray();

        return [
            'op_mestre_a' => $this->faker->randomElement($operadores),
            'op_sec_a' => $this->faker->randomElement($operadores),
            'valor_mestre_a' => $this->faker->randomFloat(3, 100, 500),
            'tipo_op_a' => $this->faker->randomElement(['compra', 'venda']),
            'variacao_a' => 0,
            'contas_mestre_a' => ['114***247', '114***300'],
            'contas_sec_a' => ['114***111'],

            'op_mestre_b' => $this->faker->randomElement($operadores),
            'op_sec_b' => $this->faker->randomElement($operadores),
            'tipo_op_b' => $this->faker->randomElement(['compra', 'venda']),
            'contas_mestre_b' => ['114***555'],
            'contas_sec_b' => ['114***777'],

            'date_creation' => now(),
        ];
    }
}
