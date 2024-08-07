<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{

    public function run(): void
    {
        //
        Paciente::factory()->count(50)->create()->each(function ($user){
            $user->assignRole('paciente');
        });
        
    }
}
