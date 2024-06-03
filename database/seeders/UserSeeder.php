<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'johndoe@example.com',
                'birthdate' => '1990-01-01',
                'role' => 'ADMIN', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123') // Añadido campo de contraseña hasheada
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'email' => 'janesmith@example.com',
                'birthdate' => '1985-05-15',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Carlos Méndez',
                'username' => 'carlosmendez',
                'email' => 'carlosmendez@example.com',
                'birthdate' => '1992-07-20',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Ana Gómez',
                'username' => 'anagomez',
                'email' => 'anagomez@example.com',
                'birthdate' => '1988-10-30',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Luis Rodríguez',
                'username' => 'luisrodriguez',
                'email' => 'luisrodriguez@example.com',
                'birthdate' => '1995-03-25',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'María Pérez',
                'username' => 'mariaperez',
                'email' => 'mariaperez@example.com',
                'birthdate' => '1993-08-17',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Pedro Sánchez',
                'username' => 'pedrosanchez',
                'email' => 'pedrosanchez@example.com',
                'birthdate' => '1987-11-05',
                'role' => 'ADMIN', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Lucía Torres',
                'username' => 'luciatorres',
                'email' => 'luciatorres@example.com',
                'birthdate' => '1994-06-12',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Sofía Ramírez',
                'username' => 'sofiaramirez',
                'email' => 'sofiaramirez@example.com',
                'birthdate' => '1991-09-14',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Diego Fernández',
                'username' => 'diegofernandez',
                'email' => 'diegofernandez@example.com',
                'birthdate' => '1989-12-21',
                'role' => 'USER', // Es un ENUM: ADMIN o USER
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password123')
            ]
        ];

         // Insertamos los usuarios en la base de datos
         DB::table('users')->insert($users);
    }
}
