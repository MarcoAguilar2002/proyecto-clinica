<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Secretaria;

class SecretariaSeeder extends Seeder
{
    public function run()
    {
        Secretaria::factory()->count(20)->create()->each(function ($user){
            $user->assignRole('secretaria');
        });
    }
}
