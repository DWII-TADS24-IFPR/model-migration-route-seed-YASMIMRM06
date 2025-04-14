@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Turmas Cadastradas</h1>
        <a href="{{ route('turmas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Turma
        </a>
    </div>

    <!-- Tabela de turmas -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Período</th>
                    <th>Alunos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($turmas as $turma)
                <tr>
                    <td>{{ $turma->codigo }}</td>
                    <td>{{ $turma->curso->nome }}</td>
                    <td>{{ $turma->ano }}.{{ $turma->semestre }}</td>
                    <td>{{ $turma->alunos->count() }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('turmas.show', $turma->id) }}" 
                               class="btn btn-sm btn-info" title="Visualizar">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('turmas.edit', $turma->id) }}" 
                               class="btn btn-sm btn-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST">
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
                    <td colspan="5" class="text-center py-4">Nenhuma turma cadastrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection