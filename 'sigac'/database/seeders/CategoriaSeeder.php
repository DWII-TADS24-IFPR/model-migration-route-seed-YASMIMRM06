<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            [
                'nome' => 'Tecnologia da Informação',
                'descricao' => 'Cursos relacionados a TI e desenvolvimento de software',
                'icone' => 'fa-laptop-code',
                'cor' => '#3498db'
            ],
            [
                'nome' => 'Administração',
                'descricao' => 'Cursos de gestão e administração de empresas',
                'icone' => 'fa-briefcase',
                'cor' => '#2ecc71'
            ],
            [
                'nome' => 'Design',
                'descricao' => 'Cursos de design gráfico e UX/UI',
                'icone' => 'fa-palette',
                'cor' => '#9b59b6'
            ],
            [
                'nome' => 'Saúde',
                'descricao' => 'Cursos na área da saúde e bem-estar',
                'icone' => 'fa-heartbeat',
                'cor' => '#e74c3c'
            ],
            [
                'nome' => 'Idiomas',
                'descricao' => 'Cursos de línguas estrangeiras',
                'icone' => 'fa-language',
                'cor' => '#f39c12'
            ]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}