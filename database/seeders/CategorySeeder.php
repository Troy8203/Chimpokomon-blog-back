<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Con factory
        //Category::factory()->count(50)->create();

        DB::table('categories')->insert([
            [
                'name' => 'Desarrollo Web',
                'description' => 'Recursos, tutoriales y noticias sobre desarrollo web.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inteligencia Artificial',
                'description' => 'Todo sobre IA, machine learning y data science.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DevOps',
                'description' => 'Prácticas y herramientas de DevOps para optimización de procesos.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciberseguridad',
                'description' => 'Noticias y consejos sobre seguridad informática y ciberseguridad.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desarrollo Móvil',
                'description' => 'Tutoriales y noticias sobre desarrollo de aplicaciones móviles.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bases de Datos',
                'description' => 'Todo sobre gestión y administración de bases de datos.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blockchain',
                'description' => 'Noticias y tutoriales sobre tecnología blockchain y criptomonedas.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programación',
                'description' => 'Artículos, tutoriales y recursos sobre diferentes lenguajes de programación.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Recursos y noticias sobre computación en la nube.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hardware',
                'description' => 'Noticias y análisis sobre hardware y gadgets tecnológicos.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
