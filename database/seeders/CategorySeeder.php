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
        Category::factory()->count(50)->create();

        /* DB::table('categories')->insert([
            [
                'name' => 'Tecnología',
                'description' => 'Todo sobre lo último en tecnología y gadgets.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salud',
                'description' => 'Consejos de salud, noticias e información.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Estilo de Vida',
                'description' => 'Artículos sobre estilo de vida, moda y bienestar.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Viajes',
                'description' => 'Guías e historias sobre viajar por el mundo.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finanzas',
                'description' => 'Consejos para manejar el dinero y noticias financieras.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Educación',
                'description' => 'Recursos y noticias en el sector educativo.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entretenimiento',
                'description' => 'Últimas noticias sobre películas, música y programas de TV.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deportes',
                'description' => 'Actualizaciones y noticias en el mundo de los deportes.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciencia',
                'description' => 'Descubrimientos y noticias en el mundo de la ciencia.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comida',
                'description' => 'Recetas, noticias de alimentos y consejos culinarios.',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); */
    }
}
