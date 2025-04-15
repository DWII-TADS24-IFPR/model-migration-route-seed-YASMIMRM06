<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        $alunos = [
            [
                'nome' => 'João Silva',
                'email' => 'joao.silva@example.com',
                'cpf' => '123.456.789-00',
                'data_nascimento' => '1990-05-15',
                'telefone' => '(11) 99999-9999',
                'endereco' => 'Rua das Flores, 123',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'cep' => '01234-567'
            ],
            [
                'nome' => 'Maria Oliveira',
                'email' => 'maria.oliveira@example.com',
                'cpf' => '987.654.321-00',
                'data_nascimento' => '1992-08-20',
                'telefone' => '(21) 98888-8888',
                'endereco' => 'Avenida Brasil, 456',
                'cidade' => 'Rio de Janeiro',
                'estado' => 'RJ',
                'cep' => '20000-000'
            ],
            [
                'nome' => 'Carlos Souza',
                'email' => 'carlos.souza@example.com',
                'cpf' => '456.789.123-00',
                'data_nascimento' => '1985-11-30',
                'telefone' => '(31) 97777-7777',
                'endereco' => 'Rua Minas Gerais, 789',
                'cidade' => 'Belo Horizonte',
                'estado' => 'MG',
                'cep' => '30000-000'
            ],
            [
                'nome' => 'Ana Pereira',
                'email' => 'ana.pereira@example.com',
                'cpf' => '789.123.456-00',
                'data_nascimento' => '1988-03-25',
                'telefone' => '(41) 96666-6666',
                'endereco' => 'Rua Paraná, 101',
                'cidade' => 'Curitiba',
                'estado' => 'PR',
                'cep' => '80000-000'
            ],
            [
                'nome' => 'Pedro Costa',
                'email' => 'pedro.costa@example.com',
                'cpf' => '321.654.987-00',
                'data_nascimento' => '1995-07-10',
                'telefone' => '(51) 95555-5555',
                'endereco' => 'Avenida Farrapos, 202',
                'cidade' => 'Porto Alegre',
                'estado' => 'RS',
                'cep' => '90000-000'
            ]
        ];

        foreach ($alunos as $aluno) {
            Aluno::create($aluno);
        }
    }
}