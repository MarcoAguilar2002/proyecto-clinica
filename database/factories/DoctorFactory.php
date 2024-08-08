<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class DoctorFactory extends Factory
{
    public function definition()
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'celular' => $this->faker->phoneNumber(),
            'codigo_colegiado' => $this->faker->unique()->numerify('#######'),
            'especialidad' => $this->faker->randomElement([
            'Cardiología', 
            'Dermatología', 
            'Ginecología',
            'Pediatría',
            'Neurología',
            'Ortopedia',
            'Oncología',
            'Oftalmología',
            'Psiquiatría',
            'Nefrología',
            'Endocrinología',
            'Gastroenterología',
            'Neumología',
            'Urología',
            'Reumatología',
            'Otorrinolaringología',
            'Anestesiología',
            'Medicina Interna',
            'Cirugía General',
            'Radiología']),

            'user_id' => User::factory(),
        ];
    }
}
