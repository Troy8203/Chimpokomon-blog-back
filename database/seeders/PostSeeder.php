<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Introducción a Laravel',
                'description' => 'Laravel es un framework de PHP que simplifica el desarrollo de aplicaciones web.',
                'content' => 'Laravel es un framework de PHP que simplifica el desarrollo de aplicaciones web mediante una sintaxis expresiva y elegante.',
                'slug' => Str::slug('Introducción a Laravel'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 1, // Asumiendo que el usuario con id 1 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'NestJS: Construyendo APIs robustas',
                'description' => 'NestJS es un framework progresivo para construir aplicaciones del lado del servidor con Node.js y TypeScript.',
                'content' => 'NestJS es un framework progresivo para construir aplicaciones del lado del servidor con Node.js y TypeScript.',
                'slug' => Str::slug('NestJS: Construyendo APIs robustas'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 2, // Asumiendo que el usuario con id 2 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Entendiendo TypeORM',
                'description' => 'TypeORM es un ORM que permite interactuar con bases de datos utilizando TypeScript o JavaScript.',
                'content' => 'TypeORM es un ORM que permite interactuar con bases de datos utilizando TypeScript o JavaScript.',
                'slug' => Str::slug('Entendiendo TypeORM'),
                'category_id' => 6, // Bases de Datos
                'user_id' => 3, // Asumiendo que el usuario con id 3 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Componentes en Next.js',
                'description' => 'Next.js permite el desarrollo de aplicaciones React con renderizado del lado del servidor.',
                'content' => 'Next.js permite el desarrollo de aplicaciones React con renderizado del lado del servidor, mejorando el SEO y la experiencia del usuario.',
                'slug' => Str::slug('Componentes en Next.js'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 4, // Asumiendo que el usuario con id 4 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Guía de MaterialUI',
                'description' => 'MaterialUI es una biblioteca de componentes para React que implementa Material Design.',
                'content' => 'MaterialUI es una biblioteca de componentes para React que implementa Material Design, facilitando la creación de interfaces de usuario modernas y responsivas.',
                'slug' => Str::slug('Guía de MaterialUI'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 5, // Asumiendo que el usuario con id 5 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Testing con Playwright',
                'description' => 'Playwright es una herramienta de pruebas E2E que permite automatizar interacciones en aplicaciones web.',
                'content' => 'Playwright es una herramienta de pruebas E2E que permite automatizar interacciones en aplicaciones web, asegurando su correcto funcionamiento.',
                'slug' => Str::slug('Testing con Playwright'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 6, // Asumiendo que el usuario con id 6 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'CI/CD con GitLab',
                'description' => 'GitLab proporciona una plataforma completa para la integración y entrega continua (CI/CD).',
                'content' => 'GitLab proporciona una plataforma completa para la integración y entrega continua (CI/CD), facilitando la automatización de los despliegues y pruebas.',
                'slug' => Str::slug('CI/CD con GitLab'),
                'category_id' => 3, // DevOps
                'user_id' => 7, // Asumiendo que el usuario con id 7 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Introducción a Docker',
                'description' => 'Docker permite encapsular aplicaciones y sus dependencias en contenedores.',
                'content' => 'Docker permite encapsular aplicaciones y sus dependencias en contenedores, garantizando su ejecución consistente en cualquier entorno.',
                'slug' => Str::slug('Introducción a Docker'),
                'category_id' => 3, // DevOps
                'user_id' => 8, // Asumiendo que el usuario con id 8 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Machine Learning con Python',
                'description' => 'Python es uno de los lenguajes más populares para el desarrollo de aplicaciones de machine learning.',
                'content' => 'Python es uno de los lenguajes más populares para el desarrollo de aplicaciones de machine learning, gracias a sus numerosas librerías y frameworks.',
                'slug' => Str::slug('Machine Learning con Python'),
                'category_id' => 2, // Inteligencia Artificial
                'user_id' => 9, // Asumiendo que el usuario con id 9 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Blockchain y Criptomonedas',
                'description' => 'La tecnología blockchain está revolucionando múltiples industrias.',
                'content' => 'La tecnología blockchain está revolucionando múltiples industrias, proporcionando seguridad y transparencia en las transacciones.',
                'slug' => Str::slug('Blockchain y Criptomonedas'),
                'category_id' => 7, // Blockchain
                'user_id' => 10, // Asumiendo que el usuario con id 10 existe
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Desarrollo de APIs con Flask',
                'description' => 'Aprende a construir APIs rápidas con Flask.',
                'content' => 'Flask es un microframework de Python que permite desarrollar aplicaciones web y APIs de manera sencilla y eficiente.',
                'slug' => Str::slug('Desarrollo de APIs con Flask'),
                'category_id' => 2, // Desarrollo Web
                'user_id' => 1,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Scrum para gestión de proyectos',
                'description' => 'Implementa Scrum en tus proyectos de desarrollo.',
                'content' => 'Scrum es un marco de trabajo ágil que facilita la gestión y desarrollo de proyectos complejos mediante iteraciones y feedback continuo.',
                'slug' => Str::slug('Scrum para gestión de proyectos'),
                'category_id' => 5, // Gestión de Proyectos
                'user_id' => 2,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Introducción a Kubernetes',
                'description' => 'Gestiona tus contenedores con Kubernetes.',
                'content' => 'Kubernetes es una plataforma de orquestación de contenedores que automatiza la implementación, escalado y operaciones de aplicaciones en contenedores.',
                'slug' => Str::slug('Introducción a Kubernetes'),
                'category_id' => 3, // DevOps
                'user_id' => 3,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'GraphQL vs REST',
                'description' => 'Comparación entre GraphQL y REST para APIs.',
                'content' => 'GraphQL y REST son dos enfoques diferentes para diseñar APIs. Esta guía compara sus beneficios y desventajas.',
                'slug' => Str::slug('GraphQL vs REST'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 4,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Programación Funcional en JavaScript',
                'description' => 'Aprovecha la programación funcional en JavaScript.',
                'content' => 'La programación funcional es un paradigma de programación que trata la computación como la evaluación de funciones matemáticas.',
                'slug' => Str::slug('Programación Funcional en JavaScript'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 5,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Microservicios con Spring Boot',
                'description' => 'Desarrollo de microservicios con Spring Boot.',
                'content' => 'Spring Boot facilita la creación de microservicios robustos y escalables, proporcionando una configuración predeterminada simplificada.',
                'slug' => Str::slug('Microservicios con Spring Boot'),
                'category_id' => 6, // Desarrollo Web
                'user_id' => 6,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Automatización de Tareas con Ansible',
                'description' => 'Automatiza tus tareas de TI con Ansible.',
                'content' => 'Ansible es una herramienta de automatización que permite la configuración y gestión de sistemas de forma eficiente y repetible.',
                'slug' => Str::slug('Automatización de Tareas con Ansible'),
                'category_id' => 3, // DevOps
                'user_id' => 7,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Introducción a React Native',
                'description' => 'Desarrolla aplicaciones móviles con React Native.',
                'content' => 'React Native permite el desarrollo de aplicaciones móviles utilizando React, ofreciendo una experiencia nativa en ambas plataformas, iOS y Android.',
                'slug' => Str::slug('Introducción a React Native'),
                'category_id' => 4, // Desarrollo Móvil
                'user_id' => 8,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Patrones de Diseño en JavaScript',
                'description' => 'Implementa patrones de diseño en tus proyectos de JavaScript.',
                'content' => 'Los patrones de diseño son soluciones reutilizables a problemas comunes en el diseño de software, aplicables en diversos lenguajes de programación, incluyendo JavaScript.',
                'slug' => Str::slug('Patrones de Diseño en JavaScript'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 9,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Desarrollo de Plugins para WordPress',
                'description' => 'Crea plugins personalizados para WordPress.',
                'content' => 'WordPress es una plataforma popular para la creación de sitios web, y los plugins permiten extender sus funcionalidades de manera flexible.',
                'slug' => Str::slug('Desarrollo de Plugins para WordPress'),
                'category_id' => 1, // Desarrollo Web
                'user_id' => 10,
                'status' => 'ACTIVO',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        // Insertamos los posts en la base de datos
        DB::table('posts')->insert($posts);
    }
}
