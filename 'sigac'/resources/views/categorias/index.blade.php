@extends('layouts.app')

@section('title', 'Categorias de Atividades')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categorias de Atividades Complementares</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Categoria
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Horas Máximas</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->horas_maximas_formatadas }}</td>
                    <td>{{ Str::limit($categoria->descricao, 50) }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('categorias.show', $categoria->id) }}" 
                           class="btn btn-sm btn-info" title="Visualizar">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" 
                           class="btn btn-sm btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    title="Excluir" onclick="return confirm('Tem certeza?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Nenhuma categoria cadastrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection