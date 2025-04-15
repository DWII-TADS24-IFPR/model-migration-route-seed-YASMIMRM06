@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Declaração</h1>

    <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Aluno</label>
                    <input type="text" class="form-control" value="{{ $declaracao->aluno->nome }} ({{ $declaracao->aluno->cpf }})" readonly>
                    <small class="form-text text-muted">Não é possível alterar o aluno após a emissão</small>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Curso</label>
                    <input type="text" class="form-control" value="{{ $declaracao->curso->nome }} ({{ $declaracao->curso->carga_horaria }}h)" readonly>
                    <small class="form-text text-muted">Não é possível alterar o curso após a emissão</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_emissao">Data de Emissão*</label>
                    <input type="date" class="form-control @error('data_emissao') is-invalid @enderror" id="data_emissao" name="data_emissao" value="{{ old('data_emissao', $declaracao->data_emissao->format('Y-m-d')) }}" required>
                    @error('data_emissao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_validade">Data de Validade</label>
                    <input type="date" class="form-control @error('data_validade') is-invalid @enderror" id="data_validade" name="data_validade" value="{{ old('data_validade', $declaracao->data_validade ? $declaracao->data_validade->format('Y-m-d') : '') }}">
                    @error('data_validade')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="status">Status*</label>
            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="emitida" {{ old('status', $declaracao->status) == 'emitida' ? 'selected' : '' }}>Emitida</option>
                <option value="pendente" {{ old('status', $declaracao->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="cancelada" {{ old('status', $declaracao->status) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" id="observacoes" name="observacoes" rows="3">{{ old('observacoes', $declaracao->observacoes) }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Atualizar Declaração
            </button>
            <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection