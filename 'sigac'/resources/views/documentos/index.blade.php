@extends('layouts.app')

@section('title', 'Documentos dos Alunos')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Documentos dos Alunos</h1>
        <a href="{{ route('documentos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Documento
        </a>
    </div>

    <!-- Tabela de documentos -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Aluno</th>
                    <th>Validade</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                <tr class="{{ $documento->vencido ? 'table-warning' : '' }}">
                    <td>{{ $documento->tipo }}</td>
                    <td>{{ $documento->aluno->nome }}</td>
                    <td>{{ $documento->validade->format('d/m/Y') }}</td>
                    <td>
                        @if($documento->vencido)
                            <span class="badge bg-danger">Vencido</span>
                        @else
                            <span class="badge bg-success">Válido</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('documentos.download', $documento->id) }}" 
                               class="btn btn-sm btn-primary" title="Download">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="{{ route('documentos.show', $documento->id) }}" 
                               class="btn btn-sm btn-info" title="Visualizar">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        title="Excluir" onclick="return confirm('Tem certeza?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Nenhum documento encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection