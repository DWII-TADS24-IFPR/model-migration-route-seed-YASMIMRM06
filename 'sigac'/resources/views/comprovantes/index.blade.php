@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Comprovantes de Matrícula</h1>
    
    <div class="mb-4">
        <a href="{{ route('comprovantes.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Novo Comprovante
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Filtros</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('comprovantes.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aluno_id">Aluno</label>
                            <select class="form-control" id="aluno_id" name="aluno_id">
                                <option value="">Todos</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{ $aluno->id }}" {{ request('aluno_id') == $aluno->id ? 'selected' : '' }}>
                                        {{ $aluno->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="curso_id">Curso</label>
                            <select class="form-control" id="curso_id" name="curso_id">
                                <option value="">Todos</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ request('curso_id') == $curso->id ? 'selected' : '' }}>
                                        {{ $curso->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Todos</option>
                                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="aprovado" {{ request('status') == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                                <option value="rejeitado" {{ request('status') == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filtrar
                </button>
                <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Limpar
                </a>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Aluno</th>
                    <th>Curso</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->codigo }}</td>
                    <td>{{ $comprovante->aluno->nome }}</td>
                    <td>{{ $comprovante->curso->nome }}</td>
                    <td>{{ $comprovante->data_emissao->format('d/m/Y') }}</td>
                    <td>
                        @if($comprovante->status == 'aprovado')
                            <span class="badge badge-success">Aprovado</span>
                        @elseif($comprovante->status == 'rejeitado')
                            <span class="badge badge-danger">Rejeitado</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum comprovante encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $comprovantes->appends(request()->query())->links() }}
    </div>
</div>
@endsection