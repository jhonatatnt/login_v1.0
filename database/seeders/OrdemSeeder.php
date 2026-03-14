<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ordem;

class OrdemSeeder extends Seeder
{
    public function run(): void
    {
        Ordem::factory()->count(4)->create();
    }
}
