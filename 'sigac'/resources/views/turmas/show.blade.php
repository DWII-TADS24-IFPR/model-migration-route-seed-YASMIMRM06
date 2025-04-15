@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Turma</h1>
        <div>
            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $turma->nome }} ({{ $turma->codigo }})</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informações do Curso</h5>
                    <p><strong>Curso:</strong> {{ $turma->curso->nome }}</p>
                    <p><strong>Categoria:</strong> {{ $turma->curso->categoria->nome }}</p>
                    <p><strong>Nível:</strong> {{ $turma->curso->nivel->nome }}</p>
                    <p><strong>Carga Horária:</strong> {{ $turma->curso->carga_horaria }} horas</p>
                </div>
                <div class="col-md-6">
                    <h5>Detalhes da Turma</h5>
                    <p><strong>Período:</strong> 
                        {{ $turma->data_inicio->format('d/m/Y') }} a {{ $turma->data_fim->format('d/m/Y') }}
                    </p>
                    @if($turma->horario)
                    <p><strong>Horário:</strong> {{ $turma->horario }}</p>
                    @endif
                    <p><strong>Local:</strong> {{ $turma->local ?? 'Não informado' }}</p>
                    <p><strong>Vagas:</strong> 
                        {{ $turma->vagas_disponiveis }} disponíveis de {{ $turma->vagas_totais }}
                    </p>
                    <p><strong>Status:</strong> 
                        @if($turma->status == 'ativa')
                            <span class="badge badge-success">Ativa</span>
                        @elseif($turma->status == 'concluida')
                            <span class="badge badge-secondary">Concluída</span>
                        @elseif($turma->status == 'cancelada')
                            <span class="badge badge-danger">Cancelada</span>
                        @else
                            <span class="badge badge-info">Planejada</span>
                        @endif
                    </p>
                </div>
            </div>

            <hr>

            <div class="mt-4">
                <h5>Observações</h5>
                <div class="card">
                    <div class="card-body">
                        {{ $turma->observacoes ?? 'Nenhuma observação registrada' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Alunos Matriculados</h5>
                <span class="badge badge-primary">
                    {{ $turma->alunos->count() }} aluno(s)
                </span>
            </div>
        </div>
        <div class="card-body">
            @if($turma->alunos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($turma->alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->nome }}</td>
                                <td>{{ $aluno->cpf }}</td>
                                <td>{{ $aluno->email }}</td>
                                <td>{{ $aluno->telefone }}</td>
                                <td>
                                    <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    Nenhum aluno matriculado nesta turma.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection