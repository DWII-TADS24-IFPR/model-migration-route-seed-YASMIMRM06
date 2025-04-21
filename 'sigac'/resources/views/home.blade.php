@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo ao Sistema Escolar</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Gerencie os cursos disponíveis.</p>
                    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Turmas</h5>
                    <p class="card-text">Gerencie as turmas dos alunos.</p>
                    <a href="{{ route('turmas.index') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Declarações</h5>
                    <p class="card-text">Emita declarações para alunos.</p>
                    <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection