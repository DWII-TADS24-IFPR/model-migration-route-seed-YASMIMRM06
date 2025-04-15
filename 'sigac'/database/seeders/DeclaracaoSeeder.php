<?php

namespace Database\Seeders;

use App\Models\Declaracao;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DeclaracaoSeeder extends Seeder
{
    public function run()
    {
        $declaracoes = [
            [
                'aluno_id' => 1,
                'curso_id' => 1,
                'codigo' => 'DEC-'.time().'-001',
                'data_emissao' => Carbon::now()->subDays(10),
                'data_validade' => Carbon::now()->addYear(),
                'status' => 'emitida',
                'hash_validacao' => md5('DEC-'.time().'-001'),
                'observacoes' => 'Declaração de conclusão do curso'
            ],
            [
                'aluno_id' => 2,
                'curso_id' => 2,
                'codigo' => 'DEC-'.time().'-002',
                'data_emissao' => Carbon::now()->subDays(5),
                'data_validade' => Carbon::now()->addMonths(6),
                'status' => 'emitida',
                'hash_validacao' => md5('DEC-'.time().'-002'),
                'observacoes' => 'Declaração de matrícula'
            ],
            [
                'aluno_id' => 3,
                'curso_id' => 3,
                'codigo' => 'DEC-'.time().'-003',
                'data_emissao' => Carbon::now()->subDays(15),
                'data_validade' => null,
                'status' => 'cancelada',
                'hash_validacao' => md5('DEC-'.time().'-003'),
                'observacoes' => 'Cancelada a pedido do aluno'
            ],
            [
                'aluno_id' => 4,
                'curso_id' => 4,
                'codigo' => 'DEC-'.time().'-004',
                'data_emissao' => Carbon::now()->subDays(3),
                'data_validade' => Carbon::now()->addYear(),
                'status' => 'emitida',
                'hash_validacao' => md5('DEC-'.time().'-004'),
                'observacoes' => 'Declaração de participação'
            ],
            [
                'aluno_id' => 5,
                'curso_id' => 5,
                'codigo' => 'DEC-'.time().'-005',
                'data_emissao' => Carbon::now()->subDays(20),
                'data_validade' => Carbon::now()->addYear(),
                'status' => 'emitida',
                'hash_validacao' => md5('DEC-'.time().'-005'),
                'observacoes' => 'Declaração de horas complementares'
            ]
        ];

        foreach ($declaracoes as $declaracao) {
            Declaracao::create($declaracao);
        }
    }
}