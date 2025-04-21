@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Documento</h1>
    <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $documento->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ $documento->descricao }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="pdf" {{ $documento->tipo == 'pdf' ? 'selected' : '' }}>PDF</option>
                <option value="docx" {{ $documento->tipo == 'docx' ? 'selected' : '' }}>Word</option>
                <option value="xlsx" {{ $documento->tipo == 'xlsx' ? 'selected' : '' }}>Excel</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (Deixe em branco para manter o atual)</label>
            <input type="file" class="form-control" id="arquivo" name="arquivo">
            @if($documento->arquivo)
                <small class="text-muted">Arquivo atual: {{ basename($documento->arquivo) }}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection