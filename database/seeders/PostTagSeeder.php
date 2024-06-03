<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definimos las relaciones post-tag
        $postTags = [
            ['post_id' => 1, 'tag_id' => 1], // Post 1 con Tag 1 (Laravel)
            ['post_id' => 1, 'tag_id' => 9], // Post 1 con Tag 9 (JavaScript)
            ['post_id' => 2, 'tag_id' => 2], // Post 2 con Tag 2 (NestJS)
            ['post_id' => 2, 'tag_id' => 10], // Post 2 con Tag 10 (TypeScript)
            ['post_id' => 3, 'tag_id' => 3], // Post 3 con Tag 3 (TypeORM)
            ['post_id' => 4, 'tag_id' => 4], // Post 4 con Tag 4 (Next.js)
            ['post_id' => 4, 'tag_id' => 9], // Post 4 con Tag 9 (JavaScript)
            ['post_id' => 5, 'tag_id' => 5], // Post 5 con Tag 5 (MaterialUI)
            ['post_id' => 6, 'tag_id' => 7], // Post 6 con Tag 7 (Playwright)
            ['post_id' => 7, 'tag_id' => 8], // Post 7 con Tag 8 (GitLab)
            ['post_id' => 8, 'tag_id' => 11], // Post 8 con Tag 11 (Docker)
            ['post_id' => 9, 'tag_id' => 19], // Post 9 con Tag 19 (Machine Learning)
            ['post_id' => 9, 'tag_id' => 20], // Post 9 con Tag 20 (AI)
            ['post_id' => 10, 'tag_id' => 17], // Post 10 con Tag 17 (Blockchain)
        ];

        // Insertamos las relaciones en la tabla pivote
        DB::table('post_tag')->insert($postTags);
    }
}
