<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Bebidas', 'description' => 'Variedad de bebidas refrescantes, energéticas, naturales y embotelladas.'],
            ['name' => 'Comida', 'description' => 'Productos alimenticios preparados o listos para cocinar.'],
            ['name' => 'Mascotas', 'description' => 'Artículos, alimentos y accesorios para el cuidado de tus mascotas.'],
            ['name' => 'Hogar', 'description' => 'Productos para limpieza, organización y mantenimiento del hogar.'],
            ['name' => 'Abarrotes', 'description' => 'Alimentos básicos de despensa como arroz, azúcar, aceite y más.'],
            ['name' => 'Golosinas', 'description' => 'Dulces, chocolates, caramelos y snacks para todas las edades.'],
            ['name' => 'Cuidado Personal', 'description' => 'Productos de higiene, belleza y bienestar personal.'],
            ['name' => 'Electrónica', 'description' => 'Dispositivos tecnológicos, accesorios y artículos electrónicos.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
