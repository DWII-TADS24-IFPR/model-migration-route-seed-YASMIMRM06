@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Nível</h1>
    <form action="{{ route('niveis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection