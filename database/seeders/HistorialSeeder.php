<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historial;

class HistorialSeeder extends Seeder
{
    public function run()
    {
        Historial::factory()->count(400)->create();
    }
}
