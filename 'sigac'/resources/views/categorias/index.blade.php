@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listagem de Categorias</h1>
    
    <div class="mb-4">
        <a href="{{ route('categorias.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nova Categoria
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
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Cursos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>
                        <span class="badge" style="background-color: {{ $categoria->cor }}; color: white;">
                            <i class="{{ $categoria->icone }}"></i> {{ $categoria->nome }}
                        </span>
                    </td>
                    <td>{{ Str::limit($categoria->descricao, 50) }}</td>
                    <td>{{ $categoria->cursos_count }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
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
                    <td colspan="5" class="text-center">Nenhuma categoria cadastrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $categorias->links() }}
    </div>
</div>
@endsection