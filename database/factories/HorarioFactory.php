<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\Consultorio;

class HorarioFactory extends Factory
{
    public function definition()
    {
        return [
            'dia' => $this->faker->randomElement(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado']),
            'hora_inicio' => $this->faker->time(),
            'hora_fin' => $this->faker->time(),
            'doctor_id' => Doctor::factory(),
            'consultorio_id' => Consultorio::factory(),
        ];
    }
}
