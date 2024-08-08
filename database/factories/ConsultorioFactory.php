<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultorioFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'ubicacion' => $this->faker->address(),
            'capacidad' => $this->faker->numberBetween(1, 10),
            'telefono' => $this->faker->phoneNumber(),
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

            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
        ];
    }
}
