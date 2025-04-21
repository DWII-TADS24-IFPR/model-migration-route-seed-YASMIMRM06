@extends('layouts.app')

@section('title', 'Enviar Documento')

@section('content')
<div class="max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Enviar Novo Documento</h2>
    
    <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf
        
        <div class="mb-4">
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea id="descricao" name="descricao" rows="3" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('descricao') }}</textarea>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                <select id="categoria_id" name="categoria_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }} ({{ $categoria->curso->sigla }})
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="horas_in" class="block text-sm font-medium text-gray-700">Horas Solicitadas</label>
                <input type="number" step="0.1" id="horas_in" name="horas_in" min="0.1" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="arquivo" class="block text-sm font-medium text-gray-700">Arquivo</label>
            <input type="file" id="arquivo" name="arquivo" accept=".pdf,.jpg,.jpeg,.png" required
                   class="mt-1 block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-md file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100">
            <p class="mt-1 text-sm text-gray-500">Formatos aceitos: PDF, JPG, PNG (Tamanho máximo: 5MB)</p>
        </div>
        
        <div class="flex justify-end space-x-2">
            <a href="{{ route('documentos.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Enviar Documento
            </button>
        </div>
    </form>
</div>
@endsection