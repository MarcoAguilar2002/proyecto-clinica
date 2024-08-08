<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Consultorio;

class EventFactory extends Factory
{
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('+0 days', '+1 month');
        $end = (clone $start)->modify('+1 hour');
        return [
            'title' => $this->faker->sentence(),
            'start' => $start,
            'end' => $end,
            'color' => $this->faker->hexColor(),
            'estado' => $this->faker->randomElement(['Finalizada', 'En Curso', 'Cancelada']),
            'user_id' => User::factory(),
            'doctor_id' => Doctor::factory(),
            'consultorio_id' => Consultorio::factory(),
        ];
    }
}
