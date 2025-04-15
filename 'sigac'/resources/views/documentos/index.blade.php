@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Documentos dos Alunos</h1>

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
            <form method="GET" action="{{ route('documentos.index') }}">
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
                            <label for="tipo">Tipo de Documento</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="">Todos</option>
                                <option value="rg" {{ request('tipo') == 'rg' ? 'selected' : '' }}>RG</option>
                                <option value="cpf" {{ request('tipo') == 'cpf' ? 'selected' : '' }}>CPF</option>
                                <option value="historico" {{ request('tipo') == 'historico' ? 'selected' : '' }}>Histórico</option>
                                <option value="certificado" {{ request('tipo') == 'certificado' ? 'selected' : '' }}>Certificado</option>
                                <option value="outro" {{ request('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
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
                <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Limpar
                </a>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Aluno</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Data Envio</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                <tr>
                    <td>{{ $documento->aluno->nome }}</td>
                    <td>
                        @switch($documento->tipo)
                            @case('rg') RG @break
                            @case('cpf') CPF @break
                            @case('historico') Histórico @break
                            @case('certificado') Certificado @break
                            @default Outro
                        @endswitch
                    </td>
                    <td>{{ $documento->descricao }}</td>
                    <td>{{ $documento->data_envio->format('d/m/Y') }}</td>
                    <td>
                        @if($documento->status == 'aprovado')
                            <span class="badge badge-success">Aprovado</span>
                        @elseif($documento->status == 'rejeitado')
                            <span class="badge badge-danger">Rejeitado</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ Storage::url($documento->arquivo_path) }}" class="btn btn-sm btn-success" target="_blank">
                            <i class="fas fa-download"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum documento encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $documentos->appends(request()->query())->links() }}
    </div>
</div>
@endsection