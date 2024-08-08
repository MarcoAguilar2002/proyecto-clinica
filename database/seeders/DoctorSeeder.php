<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        Doctor::factory()->count(20)->create()->each(function ($user){
            $user->assignRole('doctor');
        });
    }
}
