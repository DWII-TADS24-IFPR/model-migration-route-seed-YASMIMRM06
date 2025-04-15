@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Níveis de Ensino</h1>
    
    <div class="mb-4">
        <a href="{{ route('niveis.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Novo Nível
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Ordem</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Descrição</th>
                    <th>Cursos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->ordem }}</td>
                    <td>{{ $nivel->nome }}</td>
                    <td>{{ $nivel->sigla }}</td>
                    <td>{{ Str::limit($nivel->descricao, 50) }}</td>
                    <td>{{ $nivel->cursos_count }}</td>
                    <td>
                        <a href="{{ route('niveis.show', $nivel->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display: inline;">
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
                    <td colspan="6" class="text-center">Nenhum nível cadastrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $niveis->links() }}
    </div>
</div>
@endsection