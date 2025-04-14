@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Curso</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Informações Básicas</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nome:</strong> {{ $curso->nome }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sigla:</strong> {{ $curso->sigla }}
                        </li>
                        <li class="list-group-item">
                            <strong>Duração:</strong> {{ $curso->duracao_formatada }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Outras Informações</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Total de Alunos:</strong> {{ $curso->alunos->count() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Data de Cadastro:</strong> 
                            {{ $curso->created_at->format('d/m/Y H:i') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Última Atualização:</strong> 
                            {{ $curso->updated_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
            </div>

            @if($curso->descricao)
            <div class="mt-4">
                <h5>Descrição do Curso</h5>
                <p class="card-text">{{ $curso->descricao }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection