<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Senha padrão reutilizável
     */
    protected static ?string $password;

    /**
     * Define o estado padrão do model
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),

            'email' => fake()->unique()->safeEmail(),

            'password' => static::$password ??= Hash::make('password'),

            // sim / nao
            'confirm_email' => fake()->randomElement(['sim', 'nao']),

            // 0 = comum | 1 = operador | 2 = admin | 3 = super admin
            'role_user' => fake()->numberBetween(0, 3),

            // criação automática
            'date_creation' => now(),

            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Usuário com e-mail confirmado
     */
    public function emailConfirmado(): static
    {
        return $this->state(fn () => [
            'confirm_email' => 'sim',
        ]);
    }

    /**
     * Usuário administrador
     */
    public function admin(): static
    {
        return $this->state(fn () => [
            'role_user' => 2,
        ]);
    }
}
