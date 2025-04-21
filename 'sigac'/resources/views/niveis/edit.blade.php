@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Nível</h1>
    <form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $nivel->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection