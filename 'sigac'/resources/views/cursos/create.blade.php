@extends('layouts.app')

@section('title', 'Cadastrar Curso')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Cadastrar Novo Curso</h1>
    
    <form action="{{ route('cursos.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome do Curso *</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <div class="invalid-feedback">
                    Por favor, informe o nome do curso.
                </div>
            </div>

            <div class="col-md-3">
                <label for="sigla" class="form-label">Sigla *</label>
                <input type="text" class="form-control" id="sigla" name="sigla" required>
                <div class="invalid-feedback">
                    Por favor, informe a sigla do curso.
                </div>
            </div>

            <div class="col-md-3">
                <label for="duracao" class="form-label">Duração (semestres) *</label>
                <input type="number" class="form-control" id="duracao" name="duracao" min="1" required>
                <div class="invalid-feedback">
                    Por favor, informe a duração em semestres.
                </div>
            </div>

            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Cadastrar Curso
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