@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Novo Documento</h1>

    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="aluno_id">Aluno*</label>
            <select class="form-control @error('aluno_id') is-invalid @enderror" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }} ({{ $aluno->cpf }})
                    </option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo de Documento*</label>
                    <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                        <option value="">Selecione um tipo</option>
                        <option value="rg" {{ old('tipo') == 'rg' ? 'selected' : '' }}>RG</option>
                        <option value="cpf" {{ old('tipo') == 'cpf' ? 'selected' : '' }}>CPF</option>
                        <option value="historico" {{ old('tipo') == 'historico' ? 'selected' : '' }}>Histórico Escolar</option>
                        <option value="certificado" {{ old('tipo') == 'certificado' ? 'selected' : '' }}>Certificado</option>
                        <option value="outro" {{ old('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status*</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="aprovado" {{ old('status') == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                        <option value="rejeitado" {{ old('status') == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição*</label>
            <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="arquivo">Arquivo* (PDF, JPEG, PNG)</label>
            <input type="file" class="form-control-file @error('arquivo') is-invalid @enderror" id="arquivo" name="arquivo" required>
            @error('arquivo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" id="observacoes" name="observacoes" rows="3">{{ old('observacoes') }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar Documento
            </button>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection