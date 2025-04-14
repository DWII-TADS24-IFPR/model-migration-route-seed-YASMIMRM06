<?php
// app/Http/Controllers/AlunoController.php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // Lista todos os alunos
    public function index()
    {
        $alunos = Aluno::with('curso')->get(); // Carrega os cursos relacionados
        return view('alunos.index', compact('alunos'));
    }

    // Mostra formulário de criação
    public function create()
    {
        $cursos = Curso::all(); // Lista cursos para o select
        return view('alunos.create', compact('cursos'));
    }

    // Salva novo aluno
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:alunos',
            'matricula' => 'required|string|unique:alunos',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        Aluno::create($request->all()); // Mass assignment

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    // Mostra detalhes de um aluno
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    // Mostra formulário de edição
    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        return view('alunos.edit', compact('aluno', 'cursos'));
    }

    // Atualiza aluno
    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'matricula' => 'required|string|unique:alunos,matricula,' . $aluno->id,
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    // Exclui aluno (SoftDelete)
    public function destroy(Aluno $aluno)
    {
        $aluno->delete(); // Não remove do banco, só marca como excluído

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno excluído com sucesso!');
    }
}