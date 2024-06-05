<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Usuario::factory()->create([
            'nome' => 'Admin',
            'email' => 'admin@admin.com',
            'senha' => bcrypt('admin123')
        ]);
    }
}
