@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Categoria</h1>
        <div>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header" style="background-color: {{ $categoria->cor }}; color: white;">
            <h3 class="mb-0">
                <i class="{{ $categoria->icone }}"></i> {{ $categoria->nome }}
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5>Descrição:</h5>
                    <p>{{ $categoria->descricao ?? 'Nenhuma descrição cadastrada' }}</p>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Estatísticas
                        </div>
                        <div class="card-body">
                            <p><strong>Cursos associados:</strong> {{ $categoria->cursos_count }}</p>
                            <p><strong>Criada em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Última atualização:</strong> {{ $categoria->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h4>Cursos nesta categoria</h4>
            @if($categoria->cursos->count() > 0)
                <div class="row">
                    @foreach($categoria->cursos as $curso)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->nome }}</h5>
                                    <p class="card-text">{{ Str::limit($curso->descricao, 100) }}</p>
                                    <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-outline-primary">
                                        Ver