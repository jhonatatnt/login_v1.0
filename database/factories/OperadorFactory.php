<?php

namespace Database\Factories;

use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Operador>
 */
class OperadorFactory extends Factory
{
    protected $model = Operador::class;

    public function definition(): array
    {
        return [
            // cod_operador será gerado automaticamente pelo Model
            'name_operador' => fake()->firstName(),
            'foto' => null,
            'color' => fake()->hexColor(),
            'status_ativo' => fake()->randomElement([0, 1]),
            'local' => fake()->city(),
            'date_creation' => now(),
        ];
    }

    /**
     * Operador ativo
     */
    public function ativo(): static
    {
        return $this->state(fn () => [
            'status_ativo' => 1,
        ]);
    }

    /**
     * Operador inativo
     */
    public function inativo(): static
    {
        return $this->state(fn () => [
            'status_ativo' => 0,
        ]);
    }
}
