@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Nível</h1>
        <div>
            <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('niveis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $nivel->nome }} ({{ $nivel->sigla }})</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5>Descrição:</h5>
                    <p>{{ $nivel->descricao ?? 'Nenhuma descrição cadastrada' }}</p>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Estatísticas
                        </div>
                        <div class="card-body">
                            <p><strong>Ordem de exibição:</strong> {{ $nivel->ordem }}</p>
                            <p><strong>Cursos associados:</strong> {{ $nivel->cursos_count }}</p>
                            <p><strong>Criado em:</strong> {{ $nivel->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Última atualização:</strong> {{ $nivel->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h4>Cursos neste nível</h4>
            @if($nivel->cursos->count() > 0)
                <div class="row">
                    @foreach($nivel->cursos as $curso)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->nome }}</h5>
                                    <p class="card-text">{{ Str::limit($curso->descricao, 100) }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Categoria: {{ $curso->categoria->nome }}
                                        </small>
                                    </p>
                                    <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-outline-primary">
                                        Ver detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    Nenhum curso cadastrado neste nível.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection