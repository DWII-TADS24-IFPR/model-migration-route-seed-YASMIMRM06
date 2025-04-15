<?php

namespace Database\Seeders;

use App\Models\Documento;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run()
    {
        $documentos = [
            [
                'aluno_id' => 1,
                'tipo' => 'rg',
                'descricao' => 'Cópia do RG',
                'arquivo_path' => 'documentos/rg_joao.pdf',
                'tipo_arquivo' => 'PDF',
                'data_envio' => Carbon::now()->subDays(30),
                'status' => 'aprovado',
                'observacoes' => 'Documento válido'
            ],
            [
                'aluno_id' => 1,
                'tipo' => 'cpf',
                'descricao' => 'Cópia do CPF',
                'arquivo_path' => 'documentos/cpf_joao.pdf',
                'tipo_arquivo' => 'PDF',
                'data_envio' => Carbon::now()->subDays(30),
                'status' => 'aprovado',
                'observacoes' => 'Documento válido'
            ],
            [
                'aluno_id' => 2,
                'tipo' => 'rg',
                'descricao' => 'Cópia do RG',
                'arquivo_path' => 'documentos/rg_maria.pdf',
                'tipo_arquivo' => 'PDF',
                'data_envio' => Carbon::now()->subDays(25),
                'status' => 'aprovado',
                'observacoes' => 'Documento válido'
            ],
            [
                'aluno_id' => 3,
                'tipo' => 'historico',
                'descricao' => 'Histórico escolar',
                'arquivo_path' => 'documentos/historico_carlos.pdf',
                'tipo_arquivo' => 'PDF',
                'data_envio' => Carbon::now()->subDays(15),
                'status' => 'pendente',
                'observacoes' => 'Aguardando análise'
            ],
            [
                'aluno_id' => 4,
                'tipo' => 'certificado',
                'descricao' => 'Certificado curso anterior',
                'arquivo_path' => 'documentos/certificado_ana.pdf',
                'tipo_arquivo' => 'PDF',
                'data_envio' => Carbon::now()->subDays(10),
                'status' => 'rejeitado',
                'observacoes' => 'Documento ilegível, necessário reenvio'
            ]
        ];

        foreach ($documentos as $documento) {
            Documento::create($documento);
        }
    }
}