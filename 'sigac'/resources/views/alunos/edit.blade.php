@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Aluno</h1>
    
    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome Completo *</label>
                <input type="text" class="form-control" id="nome" name="nome" 
                       value="{{ old('nome', $aluno->nome) }}" required>
                <div class="invalid-feedback">
                    Por favor, informe o nome do aluno.
                </div>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $aluno->email) }}" required>
                <div class="invalid-feedback">
                    Por favor, informe um email válido.
                </div>
            </div>

            <div class="col-md-4">
                <label for="matricula" class="form-label">Matrícula *</label>
                <input type="text" class="form-control" id="matricula" name="matricula" 
                       value="{{ old('matricula', $aluno->matricula) }}" required>
                <div class="invalid-feedback">
                    Por favor, informe a matrícula.
                </div>
            </div>

            <div class="col-md-4">
                <label for="data_nascimento" class="form-label">Data de Nascimento *</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" 
                       value="{{ old('data_nascimento', $aluno->data_nascimento->format('Y-m-d')) }}" required>
                <div class="invalid-feedback">
                    Por favor, informe a data de nascimento.
                </div>
            </div>

            <div class="col-md-4">
                <label for="curso_id" class="form-label">Curso *</label>
                <select class="form-select" id="curso_id" name="curso_id" required>
                    <option value="" disabled>Selecione um curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" 
                            {{ $aluno->curso_id == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nome }}
                        </option>
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
                <i class="fas fa-save"></i> Salvar Alterações
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