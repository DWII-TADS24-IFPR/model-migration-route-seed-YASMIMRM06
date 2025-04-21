@extends('layouts.app')

@section('title', 'Níveis de Ensino')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Níveis de Ensino</h2>
    <a href="{{ route('niveis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Novo Nível
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantidade de Cursos</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($niveis as $nivel)
            <tr>
                <td class="px-6 py-4">{{ $nivel->nome }}</td>
                <td class="px-6 py-4">{{ $nivel->cursos_count }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('niveis.edit', $nivel->id) }}" class="text-green-600 hover:text-green-800">Editar</a>
                    <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $niveis->links() }}
</div>
@endsection