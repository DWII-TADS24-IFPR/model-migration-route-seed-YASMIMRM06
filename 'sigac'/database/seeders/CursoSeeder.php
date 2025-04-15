<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $cursos = [
            [
                'nome' => 'Desenvolvimento Web com Laravel',
                'codigo' => 'LAR-101',
                'descricao' => 'Curso completo de desenvolvimento web com o framework Laravel',
                'categoria_id' => 1,
                'nivel_id' => 2,
                'carga_horaria' => 60,
                'valor' => 1200.00,
                'ativo' => true
            ],
            [
                'nome' => 'Gestão de Projetos Ágeis',
                'codigo' => 'GP-201',
                'descricao' => 'Metodologias ágeis e gestão de projetos de software',
                'categoria_id' => 2,
                'nivel_id' => 3,
                'carga_horaria' => 40,
                'valor' => 900.00,
                'ativo' => true
            ],
            [
                'nome' => 'UI/UX Design',
                'codigo' => 'UX-301',
                'descricao' => 'Design de interfaces e experiência do usuário',
                'categoria_id' => 3,
                'nivel_id' => 2,
                'carga_horaria' => 50,
                'valor' => 1100.00,
                'ativo' => true
            ],
            [
                'nome' => 'Primeiros Socorros',
                'codigo' => 'PS-401',
                'descricao' => 'Noções básicas de primeiros socorros',
                'categoria_id' => 4,
                'nivel_id' => 1,
                'carga_horaria' => 20,
                'valor' => 400.00,
                'ativo' => true
            ],
            [
                'nome' => 'Inglês Intermediário',
                'codigo' => 'ING-202',
                'descricao' => 'Curso de inglês nível intermediário',
                'categoria_id' => 5,
                'nivel_id' => 2,
                'carga_horaria' => 80,
                'valor' => 1500.00,
                'ativo' => true
            ]
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}