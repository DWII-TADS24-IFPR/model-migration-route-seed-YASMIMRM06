@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Declaração Acadêmica</h1>
        <div>
            <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('declaracoes.download', $declaracao->id) }}" class="btn btn-success" target="_blank">
                <i class="fas fa-download"></i> Baixar
            </a>
            <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detalhes da Declaração</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Informações do Aluno</h5>
                    <p><strong>Nome:</strong> {{ $declaracao->aluno->nome }}</p>
                    <p><strong>CPF:</strong> {{ $declaracao->aluno->cpf }}</p>
                    <p><strong>Email:</strong> {{ $declaracao->aluno->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Informações do Curso</h5>
                    <p><strong>Curso:</strong> {{ $declaracao->curso->nome }}</p>
                    <p><strong>Categoria:</strong> {{ $declaracao->curso->categoria->nome }}</p>
                    <p><strong>Carga Horária:</strong> {{ $declaracao->curso->carga_horaria }} horas</p>
                </div>
            </div>

            <hr>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Dados da Declaração</h5>
                    <p><strong>Código:</strong> {{ $declaracao->codigo }}</p>
                    <p><strong>Data de Emissão:</strong> {{ $declaracao->data_emissao->format('d/m/Y') }}</p>
                    <p><strong>Data de Validade:</strong> 
                        {{ $declaracao->data_validade ? $declaracao->data_validade->format('d/m/Y') : 'N/A' }}
                    </p>
                    <p><strong>Status:</strong> 
                        @if($declaracao->status == 'emitida')
                            <span class="badge badge-success">Emitida</span>
                        @elseif($declaracao->status == 'cancelada')
                            <span class="badge badge-danger">Cancelada</span>
                        @else
                            <span class="badge badge-warning">Pendente</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h5>Validação</h5>
                    <div class="alert alert-info">
                        <p class="mb-1"><strong>Hash de Validação:</strong></p>
                        <code>{{ $declaracao->hash_validacao }}</code>
                        <p class="mt-2 mb-0">Esta declaração pode ser validada em nosso sistema.</p>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h5>Observações</h5>
                <div class="card">
                    <div class="card-body">
                        {{ $declaracao->observacoes ?? 'Nenhuma observação registrada' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Pré-visualização da Declaração</h5>
        </div>
        <div class="card-body">
            <div class="border p-4">
                <!-- Conteúdo da declaração -->
                <div class="text-center mb-4">
                    <h2>DECLARAÇÃO</h2>
                </div>
                
                <p class="text-justify">
                    Declaramos para os devidos fins que <strong>{{ $declaracao->aluno->nome }}</strong>, 
                    portador(a) do CPF nº <strong>{{ $declaracao->aluno->cpf }}</strong>, está regularmente matriculado(a) 
                    no curso de <strong>{{ $declaracao->curso->nome }}</strong>, com carga horária total de 
                    <strong>{{ $declaracao->curso->carga_horaria }} horas</strong>, conforme registros acadêmicos desta instituição.
                </p>
                
                <p class="text-justify">
                    Por ser verdade, firmamos a presente declaração para que produza os efeitos jurídicos desejados.
                </p>
                
                <div class="row mt-5">
                    <div class="col-md-6">
                        <p>Data de Emissão: {{ $declaracao->data_emissao->format('d/m/Y') }}</p>
                        @if($declaracao->data_validade)
                        <p>Validade: {{ $declaracao->data_validade->format('d/m/Y') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="mb-5">_________________________________</p>
                        <p>Assinatura do Responsável</p>
                    </div>
                </div>
                
                <div class="mt-4 text-center">
                    <small class="text-muted">
                        Código de validação: {{ $declaracao->codigo }} | 
                        Hash: {{ substr($declaracao->hash_validacao, 0, 8) }}...{{ substr($declaracao->hash_validacao, -8) }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection