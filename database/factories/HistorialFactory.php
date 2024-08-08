<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\Doctor;

class HistorialFactory extends Factory
{
    public function definition()
    {
        return [
            'detalle' => $this->faker->paragraph(),
            'fechaVisita' => $this->faker->date(),
            'paciente_id' => Paciente::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
