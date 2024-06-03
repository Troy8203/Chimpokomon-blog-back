<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Con factory
       // Tag::factory()->count(10)->hasPosts(10)->create();

        //Creando 10 sedeers para tags
        DB::table('tags')->insert([
            [
                'name' => 'Laravel',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'NestJS',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'TypeORM',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Next.js',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'MaterialUI',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Storybook',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Playwright',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'GitLab',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'JavaScript',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'TypeScript',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Docker',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kubernetes',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'React',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vue.js',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Angular',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Python',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Django',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Flask',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Machine Learning',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'AI',
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
