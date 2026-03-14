<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estrategia;

class EstrategiaSeeder extends Seeder
{
    public function run(): void
    {
        Estrategia::factory()->count(3)->create();
    }
}
