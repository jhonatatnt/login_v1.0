<?php

namespace Database\Factories;

use App\Models\Conta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<\App\Models\Conta>
 */
class ContaFactory extends Factory
{
    protected $model = Conta::class;

    public function definition(): array
    {
        return [
            'conta' => '114***' . $this->faker->numberBetween(100, 999),
            'qtd_contrato' => $this->faker->numberBetween(1, 50),

            'login_email' => $this->faker->unique()->safeEmail(),
            'login_senha' => $this->faker->password(8, 20),
            'senha_operacao' => $this->faker->password(8, 20),

            'valor_ganho' => $this->faker->numberBetween(100, 10000),
            'valor_perda' => $this->faker->numberBetween(100, 10000),

            'status_conta' => $this->faker->randomElement([
                'ativo',
                'inativo',
                'bloqueado'
            ]),

            'date_creation' => now(),
        ];
    }
}
