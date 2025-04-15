@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Documento</h1>

    <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Aluno</label>
            <input type="text" class="form-control" value="{{ $documento->aluno->nome }} ({{ $documento->aluno->cpf }})" readonly>
            <small class="form-text text-muted">Não é possível alterar o aluno após o cadastro</small>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo de Documento*</label>
                    <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                        <option value="">Selecione um tipo</option>
                        <option value="rg" {{ old('tipo', $documento->tipo) == 'rg' ? 'selected' : '' }}>RG</option>
                        <option value="cpf" {{ old('tipo', $documento->tipo) == 'cpf' ? 'selected' : '' }}>CPF</option>
                        <option value="historico" {{ old('tipo', $documento->tipo) == 'historico' ? 'selected' : '' }}>Histórico Escolar</option>
                        <option value="certificado" {{ old('tipo', $documento->tipo) == 'certificado' ? 'selected' : '' }}>Certificado</option>
                        <option value="outro" {{ old('tipo', $documento->tipo) == 'outro' ? 'selected' : '' }}>Outro</option>
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
                        <option value="pendente" {{ old('status', $documento->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="aprovado" {{ old('status', $documento->status) == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                        <option value="rejeitado" {{ old('status', $documento->status) == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição*</label>
            <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao', $documento->descricao) }}" required>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="arquivo">Arquivo (PDF, JPEG, PNG)</label>
            <input type="file" class="form-control-file @error('arquivo') is-invalid @enderror" id="arquivo" name="arquivo">
            @error('arquivo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($documento->arquivo_path)
                <small class="form-text text-muted">
                    Arquivo atual: <a href="{{ Storage::url($documento->arquivo_path) }}" target="_blank">Visualizar</a>
                </small>
            @endif
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" id="observacoes" name="observacoes" rows="3">{{ old('observacoes', $documento->observacoes) }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Atualizar Documento
            </button>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection