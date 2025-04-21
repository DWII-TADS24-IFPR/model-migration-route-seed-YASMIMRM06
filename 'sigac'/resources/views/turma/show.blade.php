@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Turma</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $turma->nome }}</h5>
            <p class="card-text"><strong>Curso:</strong> {{ $turma->curso->nome }}</p>
            <p class="card-text"><strong>Ano:</strong> {{ $turma->ano }}</p>
            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
    <a href="{{ route('turmas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection