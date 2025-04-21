@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Nível</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $nivel->nome }}</h5>
            <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
    <a href="{{ route('niveis.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
