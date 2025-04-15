<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriaSeeder::class,
            NivelSeeder::class,
            CursoSeeder::class,
            AlunoSeeder::class,
            TurmaSeeder::class,
            ComprovanteSeeder::class,
            DeclaracaoSeeder::class,
            DocumentoSeeder::class,
        ]);
    }
}