<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Categoria::create([
            'nombre' => 'Electrónicos',
            'descripcion' => 'Productos electrónicos y tecnología'
        ]);

        Categoria::create([
            'nombre' => 'Ropa',
            'descripcion' => 'Ropa y accesorios'
        ]);

        Categoria::create([
            'nombre' => 'Hogar',
            'descripcion' => 'Artículos para el hogar'
        ]);
    }
}
