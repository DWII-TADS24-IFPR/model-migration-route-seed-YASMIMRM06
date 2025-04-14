@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Cadastrar Novo Aluno</h1>
    
    <form action="{{ route('alunos.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome Completo *</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <div class="invalid-feedback">
                    Por favor, informe o nome do aluno.
                </div>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Por favor, informe um email válido.
                </div>
            </div>

            <div class="col-md-4">
                <label for="matricula" class="form-label">Matrícula *</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
                <div class="invalid-feedback">
                    Por favor, informe a matrícula.
                </div>
            </div>

            <div class="col-md-4">
                <label for="data_nascimento" class="form-label">Data de Nascimento *</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                <div class="invalid-feedback">
                    Por favor, informe a data de nascimento.
                </div>
            </div>

            <div class="col-md-4">
                <label for="curso_id" class="form-label">Curso *</label>
                <select class="form-select" id="curso_id" name="curso_id" required>
                    <option value="" selected disabled>Selecione um curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Por favor, selecione um curso.
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar Aluno
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