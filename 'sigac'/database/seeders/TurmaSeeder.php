<?php

namespace Database\Seeders;

use App\Models\Turma;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    public function run()
    {
        $turmas = [
            [
                'curso_id' => 1,
                'codigo' => 'TUR-LAR-2023-01',
                'nome' => 'Turma Laravel 2023/01',
                'data_inicio' => Carbon::now()->addDays(10),
                'data_fim' => Carbon::now()->addDays(10)->addMonths(3),
                'horario' => '19:00:00',
                'vagas_totais' => 30,
                'vagas_disponiveis' => 15,
                'status' => 'planejada',
                'local' => 'Laboratório de Informática 1'
            ],
            [
                'curso_id' => 2,
                'codigo' => 'TUR-GP-2023-01',
                'nome' => 'Turma Gestão 2023/01',
                'data_inicio' => Carbon::now()->addDays(5),
                'data_fim' => Carbon::now()->addDays(5)->addMonths(2),
                'horario' => '14:00:00',
                'vagas_totais' => 25,
                'vagas_disponiveis' => 8,
                'status' => 'ativa',
                'local' => 'Sala 203'
            ],
            [
                'curso_id' => 3,
                'codigo' => 'TUR-UX-2023-01',
                'nome' => 'Turma UX 2023/01',
                'data_inicio' => Carbon::now()->subDays(15),
                'data_fim' => Carbon::now()->subDays(15)->addMonths(2),
                'horario' => '09:00:00',
                'vagas_totais' => 20,
                'vagas_disponiveis' => 0,
                'status' => 'ativa',
                'local' => 'Laboratório de Design'
            ],
            [
                'curso_id' => 4,
                'codigo' => 'TUR-PS-2023-01',
                'nome' => 'Turma Primeiros Socorros 2023/01',
                'data_inicio' => Carbon::now()->addDays(20),
                'data_fim' => Carbon::now()->addDays(20)->addDays(5),
                'horario' => '08:00:00',
                'vagas_totais' => 40,
                'vagas_disponiveis' => 22,
                'status' => 'planejada',
                'local' => 'Auditório Principal'
            ],
            [
                'curso_id' => 5,
                'codigo' => 'TUR-ING-2023-01',
                'nome' => 'Turma Inglês 2023/01',
                'data_inicio' => Carbon::now()->subMonths(1),
                'data_fim' => Carbon::now()->subMonths(1)->addMonths(4),
                'horario' => '18:30:00',
                'vagas_totais' => 35,
                'vagas_disponiveis' => 5,
                'status' => 'ativa',
                'local' => 'Sala 105'
            ]
        ];

        foreach ($turmas as $turma) {
            Turma::create($turma);
        }
    }
}