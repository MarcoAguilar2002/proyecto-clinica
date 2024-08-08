<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Secretaria;

class SecretariaSeeder extends Seeder
{
    public function run()
    {
        Secretaria::factory()->count(10)->create();
    }
}
