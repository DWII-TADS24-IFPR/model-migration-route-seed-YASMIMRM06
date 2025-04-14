<!-- resources/views/alunos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Novo Aluno</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Matrícula</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td>{{ $aluno->curso->nome }}</td>
                <td>
                    <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection