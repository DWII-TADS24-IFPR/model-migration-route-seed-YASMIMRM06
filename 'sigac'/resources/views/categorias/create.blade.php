@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome da Categoria*</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="icone">Ícone (Font Awesome)</label>
                    <input type="text" class="form-control @error('icone') is-invalid @enderror" id="icone" name="icone" value="{{ old('icone') }}" placeholder="Ex: fa-laptop-code">
                    @error('icone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">
                        Consulte os ícones disponíveis em <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>
                    </small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="color" class="form-control form-control-color @error('cor') is-invalid @enderror" id="cor" name="cor" value="{{ old('cor', '#6c757d') }}">
            @error('cor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar Categoria
            </button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection