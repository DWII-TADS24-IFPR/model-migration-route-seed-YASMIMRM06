@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Comprovante</h1>

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="aluno_id">Aluno*</label>
                    <select class="form-control @error('aluno_id') is-invalid @enderror" id="aluno_id" name="aluno_id" required>
                        <option value="">Selecione um aluno</option>
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}" {{ old('aluno_id', $comprovante->aluno_id) == $aluno->id ? 'selected' : '' }}>
                                {{ $aluno->nome }} ({{ $aluno->cpf }})
                            </option>
                        @endforeach
                    </select>
                    @error('aluno_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="curso_id">Curso*</label>
                    <select class="form-control @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                        <option value="">Selecione um curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id', $comprovante->curso_id) == $curso->id ? 'selected' : '' }}>
                                {{ $curso->nome }} ({{ $curso->categoria->nome }})
                            </option>
                        @endforeach
                    </select>
                    @error('curso_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_emissao">Data de Emissão*</label>
                    <input type="date" class="form-control @error('data_emissao') is-invalid @enderror" id="data_emissao" name="data_emissao" value="{{ old('data_emissao', $comprovante->data_emissao->format('Y-m-d')) }}" required>
                    @error('data_emissao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status*</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required