<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PacienteFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'dni' => $this->faker->unique()->numerify('########'),
            'celular' => $this->faker->numerify('###########'), // Ajusta el formato si es necesario
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2020-01-01'),
            'direccion' => $this->faker->address,
            'correo' => $this->faker->unique()->safeEmail,
            'grupo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-']),
            'nro_seguro' => $this->faker->unique()->numerify('##########'),
            'observaciones' => $this->faker->sentence(6, true),
        ];
    }
}
