@extends('layouts.app')

@section('title', 'Comprovantes de Atividades')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Comprovantes de Atividades</h1>
        <a href="{{ route('comprovantes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Comprovante
        </a>
    </div>

    <!-- Filtros -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="aluno_id" class="form-label">Aluno</label>
                        <select class="form-select" id="aluno_id" name="aluno_id">
                            <option value="">Todos</option>
                            @foreach($alunos as $aluno)
                                <option value="{{ $aluno->id }}" {{ request('aluno_id') == $aluno->id ? 'selected' : '' }}>
                                    {{ $aluno->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_id" name="categoria_id">
                            <option value="">Todas</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Todos</option>
                            <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="aprovado" {{ request('status') == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                            <option value="rejeitado" {{ request('status') == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Filtrar
                        </button>
                        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Limpar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabela de comprovantes -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Categoria</th>
                    <th>Horas</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->id }}</td>
                    <td>{{ $comprovante->aluno->nome }}</td>
                    <td>{{ $comprovante->categoria->nome }}</td>
                    <td>{{ $comprovante->horas_validas }}</td>
                    <td>
                        <span class="badge bg-{{ $comprovante->status == 'aprovado' ? 'success' : ($comprovante->status == 'rejeitado' ? 'danger' : 'warning') }}">
                            {{ ucfirst($comprovante->status) }}
                        </span>
                    </td>
                    <td>{{ $comprovante->created_at->format('d/m/Y') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('comprovantes.show', $comprovante->id) }}" 
                           class="btn btn-sm btn-info" title="Visualizar">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" 
                           class="btn btn-sm btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($comprovante->status == 'pendente')
                            <form action="{{ route('comprovantes.aprovar', $comprovante->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success" title="Aprovar">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form action="{{ route('comprovantes.rejeitar', $comprovante->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-danger" title="Rejeitar">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Nenhum comprovante encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="mt-4">
        {{ $comprovantes->links() }}
    </div>
</div>
@endsection