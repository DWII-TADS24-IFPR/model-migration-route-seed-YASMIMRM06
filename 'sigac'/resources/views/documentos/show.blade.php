@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Documento</h1>
        <div>
            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Informações do Documento</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informações do Aluno</h5>
                    <p><strong>Nome:</strong> {{ $documento->aluno->nome }}</p>
                    <p><strong>CPF:</strong> {{ $documento->aluno->cpf }}</p>
                    <p><strong>Email:</strong> {{ $documento->aluno->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Detalhes do Documento</h5>
                    <p><strong>Tipo:</strong> 
                        @switch($documento->tipo)
                            @case('rg') RG @break
                            @case('cpf') CPF @break
                            @case('historico') Histórico Escolar @break
                            @case('certificado') Certificado @break
                            @default Outro
                        @endswitch
                    </p>
                    <p><strong>Descrição:</strong> {{ $documento->descricao }}</p>
                    <p><strong>Data de Envio:</strong> {{ $documento->data_envio->format('d/m/Y H:i') }}</p>
                    <p><strong>Status:</strong> 
                        @if($documento->status == 'aprovado')
                            <span class="badge badge-success">Aprovado</span>
                        @elseif($documento->status == 'rejeitado')
                            <span class="badge badge-danger">Rejeitado</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5>Arquivo</h5>
                    @if($documento->arquivo_path)
                        <div class="alert alert-info">
                            <i class="fas fa-file-pdf"></i> Arquivo anexado: 
                            <a href="{{ Storage::url($documento->arquivo_path) }}" target="_blank" class="font-weight-bold">
                                Visualizar Documento
                            </a>
                            <span class="d-block mt-1">
                                <small>Tipo: {{ $documento->tipo_arquivo }}</small>
                            </span>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Nenhum arquivo anexado
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Pré-visualização</h5>
                    @if($documento->arquivo_path && in_array($documento->tipo_arquivo, ['image/jpeg', 'image/png']))
                        <img src="{{ Storage::url($documento->arquivo_path) }}" alt="Pré-visualização" class="img-thumbnail" style="max-height: 200px;">
                    @else
                        <div class="alert alert-secondary">
                            Pré-visualização não disponível para este tipo de arquivo
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <h5>Observações</h5>
                <div class="card">
                    <div class="card-body">
                        {{ $documento->observacoes ?? 'Nenhuma observação registrada' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection