@extends('layouts.app')

@section('title', 'Detalhes da Categoria')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Categoria</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
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
                            <strong>Nome:</strong> {{ $categoria->nome }}
                        </li>
                        <li class="list-group-item">
                            <strong>Horas Máximas:</strong> {{ $categoria->horas_maximas_formatadas }}
                        </li>
                        <li class="list-group-item">
                            <strong>Data de Cadastro:</strong> 
                            {{ $categoria->created_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Estatísticas</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Total de Comprovantes:</strong> {{ $categoria->comprovantes->count() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Última Atualização:</strong> 
                            {{ $categoria->updated_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
            </div>

            @if($categoria->descricao)
            <div class="mt-4">
                <h5>Descrição Completa</h5>
                <p class="card-text">{{ $categoria->descricao }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection