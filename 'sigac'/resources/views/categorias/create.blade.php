@extends('layouts.app')

@section('title', 'Cadastrar Categoria')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Cadastrar Nova Categoria</h1>
    
    <form action="{{ route('categorias.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome da Categoria *</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <div class="invalid-feedback">
                    Por favor, informe o nome da categoria.
                </div>
            </div>

            <div class="col-md-6">
                <label for="horas_maximas" class="form-label">Horas Máximas *</label>
                <input type="number" class="form-control" id="horas_maximas" 
                       name="horas_maximas" min="1" required>
                <div class="invalid-feedback">
                    Informe a quantidade máxima de horas.
                </div>
            </div>

            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Cadastrar Categoria
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
// Validação do formulário no front-end
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
@endpush
@endsection
