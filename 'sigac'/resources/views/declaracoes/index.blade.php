@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Declarações Emitidas</h1>
        <a href="{{ route('declaracoes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Declaração
        </a>
    </div>

    <!-- Tabela de declarações -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Aluno</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($declaracoes as $declaracao)
                <tr>
                    <td>{{ $declaracao->codigo }}</td>
                    <td>{{ $declaracao->aluno->nome }}</td>
                    <td>
                        <span class="badge bg-{{ $declaracao->status == 'emitida' ? 'success' : 'danger' }}">
                            {{ ucfirst($declaracao->status) }}
                        </span>
                    </td>
                    <td>{{ $declaracao->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('declaracoes.show', $declaracao->id) }}" 
                               class="btn btn-sm btn-info" title="Visualizar">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($declaracao->status == 'emitida')
                                <form action="{{ route('declaracoes.cancelar', $declaracao->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            title="Cancelar" onclick="return confirm('Cancelar esta declaração?')">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Nenhuma declaração encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection