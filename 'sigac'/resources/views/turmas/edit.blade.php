@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Turma</h1>

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Curso</label>
            <input type="text" class="form-control" value="{{ $turma->curso->nome }} ({{ $turma->curso->categoria->nome }} - {{ $turma->curso->nivel->nome }})" readonly>
            <small class="form-text text-muted">Não é possível alterar o curso após o cadastro</small>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo">Código da Turma*</label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $turma->codigo) }}" required>
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome da Turma*</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $turma->nome) }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_inicio">Data de Início*</label>
                    <input type="date" class="form-control @error('data_inicio') is-invalid @enderror" id="data_inicio" name="data_inicio" value="{{ old('data_inicio', $turma->data_inicio->format('Y-m-d')) }}" required>
                    @error('data_inicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_fim">Data de Término*</label>
                    <input type="date" class="form-control @error('data_fim') is-invalid @enderror" id="data_fim" name="data_fim" value="{{ old('data_fim', $turma->data_fim->format('Y-m-d')) }}" required>
                    @error('data_fim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="horario">Horário</label>
                    <input type="time" class="form-control @error('horario') is-invalid @enderror" id="horario" name="horario" value="{{ old('horario', $turma->horario ? \Carbon\Carbon::parse($turma->horario)->format('H:i') : '') }}">
                    @error('horario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="local">Local</label>
                    <input type="text" class="form-control @error('local') is-invalid @enderror" id="local" name="local" value="{{ old('local', $turma->local) }}">
                    @error('local')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vagas_totais">Vagas Totais*</label>
                    <input type="number" class="form-control @error('vagas_totais') is-invalid @enderror" id="vagas_totais" name="vagas_totais" value="{{ old('vagas_totais', $turma->vagas_totais) }}" min="1" required>
                    @error('vagas_totais')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status*</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="planejada" {{ old('status', $turma->status) == 'planejada' ? 'selected' : '' }}>Planejada</option>
                        <option value="ativa" {{ old('status', $turma->status) == 'ativa' ? 'selected' : '' }}>Ativa</option>
                        <option value="concluida" {{ old('status', $turma->status) == 'concluida' ? 'selected' : '' }}>Concluída</option>
                        <option value="cancelada" {{ old('status', $turma->status) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" id="observacoes" name="observacoes" rows="3">{{ old('observacoes', $turma->observacoes) }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Atualizar Turma
            </button>
            <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection