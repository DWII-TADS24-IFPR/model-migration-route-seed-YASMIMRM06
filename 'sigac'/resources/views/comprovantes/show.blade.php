@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Comprovante de Matrícula</h1>
        <div>
            <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detalhes do Comprovante</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informações do Aluno</h5>
                    <p><strong>Nome:</strong> {{ $comprovante->aluno->nome }}</p>
                    <p><strong>CPF:</strong> {{ $comprovante->aluno->cpf }}</p>
                    <p><strong>Email:</strong> {{ $comprovante->aluno->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Informações do Curso</h5>
                    <p><strong>Curso:</strong> {{ $comprovante->curso->nome }}</p>
                    <p><strong>Categoria:</strong> {{ $comprovante->curso->categoria->nome }}</p>
                    <p><strong>Carga Horária:</strong> {{ $comprovante->curso->carga_horaria }} horas</p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5>Detalhes do Comprovante</h5>
                    <p><strong>Código:</strong> {{ $comprovante->codigo }}</p>
                    <p><strong>Data de Emissão:</strong> {{ $comprovante->data_emissao->format('d/m/Y') }}</p>
                    <p><strong>Status:</strong> 
                        @if($comprovante->status == 'aprovado')
                            <span class="badge badge-success">Aprovado</span>
                        @elseif($comprovante->status == 'rejeitado')
                            <span class="badge badge-danger">Rejeitado</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h5>Arquivo</h5>
                    @if($comprovante->arquivo_path)
                        <div class="alert alert-info">
                            <i class="fas fa-file-pdf"></i> Arquivo anexado: 
                            <a href="{{ Storage::url($comprovante->arquivo_path) }}" target="_blank" class="font-weight-bold">
                                Visualizar Comprovante
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Nenhum arquivo anexado
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <h5>Observações</h5>
                <div class="card">
                    <div class="card-body">
                        {{ $comprovante->observacoes ?? 'Nenhuma observação registrada' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection