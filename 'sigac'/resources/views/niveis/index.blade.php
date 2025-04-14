@extends('layouts.app')

@section('title', 'Níveis de Ensino')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Níveis de Ensino</h1>
        <a href="{{ route('niveis.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Nível
        </a>
    </div>

    <!-- Tabela de níveis -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Total de Cursos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->id }}</td>
                    <td>{{ $nivel->nome }}</td>
                    <td>{{ $nivel->cursos->count() }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('niveis.show', $nivel->id) }}" 
                               class="btn btn-sm btn-info" title="Visualizar">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('niveis.edit', $nivel->id) }}" 
                               class="btn btn-sm btn-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST">
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
                    <td colspan="4" class="text-center py-4">Nenhum nível cadastrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection