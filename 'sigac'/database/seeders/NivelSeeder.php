<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    public function run()
    {
        $niveis = [
            [
                'nome' => 'Básico',
                'sigla' => 'BAS',
                'descricao' => 'Curso introdutório sem pré-requisitos',
                'ordem' => 1
            ],
            [
                'nome' => 'Intermediário',
                'sigla' => 'INT',
                'descricao' => 'Curso para quem já tem conhecimento básico',
                'ordem' => 2
            ],
            [
                'nome' => 'Avançado',
                'sigla' => 'AV',
                'descricao' => 'Curso para profissionais com experiência',
                'ordem' => 3
            ],
            [
                'nome' => 'Especialização',
                'sigla' => 'ESP',
                'descricao' => 'Cursos de especialização técnica',
                'ordem' => 4
            ]
        ];

        foreach ($niveis as $nivel) {
            Nivel::create($nivel);
        }
    }
}