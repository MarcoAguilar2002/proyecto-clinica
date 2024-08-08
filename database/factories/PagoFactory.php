<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\Doctor;

class PagoFactory extends Factory
{
    public function definition()
    {
        return [
            'monto' => $this->faker->randomFloat(2, 50, 500),
            'fecha_pago' => $this->faker->date(),
            'descripcion' => $this->faker->sentence(),
            'paciente_id' => Paciente::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
