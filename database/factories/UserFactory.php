<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'useNombre' => fake()->name(),
            'useApellido' => fake()->lastName(),
            'useNumDocumento' => fake()->numberBetween(10000000, 1000000000),
            'useCorreo' => fake()->email(),
            'usePassword' => fake()->password(),
            'votMesa' => fake()->numberBetween(1, 15),
            'useRol' => 'Administrador',
            //'useRol' => 'Usuario',
            //'useRol' => 'Votante',
        ];
    }
}
