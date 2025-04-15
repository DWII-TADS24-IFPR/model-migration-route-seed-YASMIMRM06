@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Declarações Emitidas</h1>
    
    <div class="mb-4">
        <a href="{{ route('declaracoes.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nova Declaração
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
            <form method="GET" action="{{ route('declaracoes.index') }}">
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
                                <option value="emitida" {{ request('status') == 'emitida' ? 'selected' : '' }}>Emitida</option>
                                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="cancelada" {{ request('status') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filtrar
                </button>
                <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
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
                    <th>Emissão</th>
                    <th>Validade</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($declaracoes as $declaracao)
                <tr>
                    <td>{{ $declaracao->codigo }}</td>
                    <td>{{ $declaracao->aluno->nome }}</td>
                    <td>{{ $declaracao->curso->nome }}</td>
                    <td>{{ $declaracao->data_emissao->format('d/m/Y') }}</td>
                    <td>{{ $declaracao->data_validade ? $declaracao->data_validade->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                        @if($declaracao->status == 'emitida')
                            <span class="badge badge-success">Emitida</span>
                        @elseif($declaracao->status == 'cancelada')
                            <span class="badge badge-danger">Cancelada</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('declaracoes.download', $declaracao->id) }}" class="btn btn-sm btn-success" target="_blank">
                            <i class="fas fa-download"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhuma declaração encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $declaracoes->appends(request()->query())->links() }}
    </div>
</div>
@endsection