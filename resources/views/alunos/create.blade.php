<!-- resources/views/alunos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Novo Aluno</h1>
    
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="matricula">