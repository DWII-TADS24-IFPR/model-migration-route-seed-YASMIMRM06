@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome da Categoria*</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="icone">Ícone (Font Awesome)</label>
                    <input type="text" class="form-control @error('icone') is-invalid @enderror" id="icone" name="icone" value="{{ old('icone', $categoria->icone) }}" placeholder="Ex: fa-laptop-code">
                    @error('icone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3">{{ old('descricao', $categoria->descricao) }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
