@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Documento</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $documento->titulo }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $documento->descricao }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $documento->tipo }}</p>
            <p class="card-text"><strong>Data de Envio:</strong> {{ $documento->created_at->format('d/m/Y H:i') }}</p>
            
            @if($documento->arquivo)
                <a href="{{ asset('storage/' . $documento->arquivo) }}" class="btn btn-primary" download>
                    Baixar Arquivo
                </a>
            @endif

            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
    <a href="{{ route('documentos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection