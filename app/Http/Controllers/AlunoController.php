// app/Http/Controllers/AlunoController.php
<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('curso')->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('alunos.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos',
            'matricula' => 'required|string|unique:alunos',
            'cpf' => 'required|string|unique:alunos',
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        return view('alunos.edit', compact('aluno', 'cursos'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,'.$aluno->id,
            'matricula' => 'required|string|unique:alunos,matricula,'.$aluno->id,
            'cpf' => 'required|string|unique:alunos,cpf,'.$aluno->id,
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}