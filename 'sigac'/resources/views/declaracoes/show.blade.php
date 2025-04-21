@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold">Declaração #{{ $declaracao->id }}</h2>
                <p class="text-gray-600">Emitida em: {{ $declaracao->data->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <a href="{{ route('declaracoes.download', $declaracao->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Download
                </a>
            </div>
        </div>
        
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-semibold mb-2">Informações do Aluno</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Nome:</span> {{ $declaracao->aluno->nome }}</p>
                    <p><span class="font-medium">CPF:</span> {{ $declaracao->aluno->cpf }}</p>
                    <p><span class="font-medium">Curso:</span> {{ $declaracao->aluno->curso->nome }}</p>
                    <p><span class="font-medium">Turma:</span> {{ $declaracao->aluno->turma->ano }}</p>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-2">Informações da Atividade</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Atividade:</span> {{ $declaracao->comprovante->atividade }}</p>
                    <p><span class="font-medium">Categoria:</span> {{ $declaracao->comprovante->categoria->nome }}</p>
                    <p><span class="font-medium">Horas:</span> {{ $declaracao->comprovante->horas }}h</p>
                    <p><span class="font-medium">Data da Atividade:</span> {{ $declaracao->comprovante->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Código de Validação</h3>
            <div class="bg-gray-100 p-4 rounded-md">
                <code class="font-mono break-all">{{ $declaracao->hash }}</code>
            </div>
            <p class="mt-2 text-sm text-gray-600">Use este código para validar a autenticidade da declaração.</p>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('declaracoes.index') }}" class="text-blue-600 hover:text-blue-800">
        ← Voltar para lista de declarações
    </a>
</div>
@endsection