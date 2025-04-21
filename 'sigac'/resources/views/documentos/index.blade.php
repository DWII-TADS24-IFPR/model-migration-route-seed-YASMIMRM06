@extends('layouts.app')

@section('title', 'Documentos Comprobatórios')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Documentos Comprobatórios</h2>
    <div class="flex space-x-2">
        <a href="{{ route('documentos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Documento
        </a>
        <a href="{{ route('documentos.export') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Exportar
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descrição</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Categoria</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Horas Solicitadas</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($documentos as $documento)
            <tr>
                <td class="px-6 py-4">{{ Str::limit($documento->descricao, 30) }}</td>
                <td class="px-6 py-4">{{ $documento->categoria->nome }}</td>
                <td class="px-6 py-4">
                    <span @class([
                        'px-2 py-1 rounded-full text-xs',
                        'bg-yellow-100 text-yellow-800' => $documento->status === 'pendente',
                        'bg-green-100 text-green-800' => $documento->status === 'aprovado',
                        'bg-red-100 text-red-800' => $documento->status === 'reprovado'
                    ])>
                        {{ ucfirst($documento->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">{{ $documento->horas_in }}h</td>
                <td class="px-6 py-4">{{ $documento->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('documentos.show', $documento->id) }}" class="text-blue-600 hover:text-blue-800">Ver</a>
                    @if($documento->status === 'pendente')
                        <a href="{{ route('documentos.edit', $documento->id) }}" class="text-green-600 hover:text-green-800">Editar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $documentos->links() }}
</div>
@endsection