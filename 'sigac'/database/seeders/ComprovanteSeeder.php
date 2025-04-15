<?php

namespace Database\Seeders;

use App\Models\Comprovante;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ComprovanteSeeder extends Seeder
{
    public function run()
    {
        $comprovantes = [
            [
                'aluno_id' => 1,
                'curso_id' => 1,
                'codigo' => 'COMP-'.time().'-001',
                'arquivo_path' => 'comprovantes/comp_laravel_joao.pdf',
                'tipo_arquivo' => 'PDF',
                'data_emissao' => Carbon::now()->subDays(5),
                'status' => 'aprovado',
                'observacoes' => 'Pagamento via PIX'
            ],
            [
                'aluno_id' => 2,
                'curso_id' => 2,
                'codigo' => 'COMP-'.time().'-002',
                'arquivo_path' => 'comprovantes/comp_gestao_maria.pdf',
                'tipo_arquivo' => 'PDF',
                'data_emissao' => Carbon::now()->subDays(3),
                'status' => 'pendente',
                'observacoes' => 'Aguardando confirmação bancária'
            ],
            [
                'aluno_id' => 3,
                'curso_id' => 3,
                'codigo' => 'COMP-'.time().'-003',
                'arquivo_path' => 'comprovantes/comp_ux_carlos.pdf',
                'tipo_arquivo' => 'PDF',
                'data_emissao' => Carbon::now()->subDays(10),
                'status' => 'aprovado',
                'observacoes' => 'Pagamento à vista'
            ],
            [
                'aluno_id' => 4,
                'curso_id' => 4,
                'codigo' => 'COMP-'.time().'-004',
                'arquivo_path' => 'comprovantes/comp_ps_ana.pdf',
                'tipo_arquivo' => 'PDF',
                'data_emissao' => Carbon::now()->subDays(2),
                'status' => 'rejeitado',
                'observacoes' => 'Valor incorreto, necessário reenvio'
            ],
            [
                'aluno_id' => 5,
                'curso_id' => 5,
                'codigo' => 'COMP-'.time().'-005',
                'arquivo_path' => 'comprovantes/comp_ingles_pedro.pdf',
                'tipo_arquivo' => 'PDF',
                'data_emissao' => Carbon::now()->subDays(7),
                'status' => 'aprovado',
                'observacoes' => 'Pagamento parcelado'
            ]
        ];

        foreach ($comprovantes as $comprovante) {
            Comprovante::create($comprovante);
        }
    }
}