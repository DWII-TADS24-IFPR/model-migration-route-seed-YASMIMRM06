<?php
namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Aluno;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with('curso')->latest()->get();
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        $cursos = Curso::orderBy('nome')->get();
        return view('turmas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'codigo' => 'required|string|max:20',
            'ano' => 'required|integer|min:2000',
            'semestre' => 'required|integer|min:1|max:2'
        ]);

        Turma::create($validated);

        return redirect()->route('turmas.index')
               ->with('success', 'Turma criada com sucesso!');
    }

    public function show(Turma $turma)
    {
        $alunos = Aluno::orderBy('nome')->get();
        $alunosNaTurma = $turma->alunos;
        
        return view('turmas.show', compact('turma', 'alunos', 'alunosNaTurma'));
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::orderBy('nome')->get();
        return view('turmas.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'codigo' => 'required|string|max:20',
            'ano' => 'required|integer|min:2000',
            'semestre' => 'required|integer|min:1|max:2'
        ]);

        $turma->update($validated);

        return redirect()->route('turmas.index')
               ->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')
               ->with('success', 'Turma removida com sucesso!');
    }

    /**
     * Adiciona aluno à turma
     */
    public function adicionarAluno(Request $request, Turma $turma)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $turma->alunos()->syncWithoutDetaching($request->aluno_id);

        return back()->with('success', 'Aluno adicionado à turma!');
    }

    /**
     * Remove aluno da turma
     */
    public function removerAluno(Turma $turma, Aluno $aluno)
    {
        $turma->alunos()->detach($aluno->id);
        return back()->with('success', 'Aluno removido da turma!');
    }
}