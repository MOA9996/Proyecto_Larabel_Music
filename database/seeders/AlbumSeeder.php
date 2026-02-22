<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Album::factory(20)->create(); // Crea 20 álbumes de prueba
    }
}
