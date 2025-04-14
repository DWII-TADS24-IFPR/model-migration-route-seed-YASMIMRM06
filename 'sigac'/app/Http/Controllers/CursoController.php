<?php
namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Exibe lista de cursos
     */
    public function index()
    {
        $cursos = Curso::latest()->get();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Mostra formulário de criação
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Armazena novo curso
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'sigla' => 'required|string|max:10|unique:cursos',
            'duracao' => 'required|integer|min:1',
            'descricao' => 'nullable|string'
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')
               ->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Exibe detalhes de um curso
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    /**
     * Mostra formulário de edição
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Atualiza curso existente
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'sigla' => 'required|string|max:10|unique:cursos,sigla,'.$curso->id,
            'duracao' => 'required|integer|min:1',
            'descricao' => 'nullable|string'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
               ->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove um curso (SoftDelete)
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')
               ->with('success', 'Curso removido com sucesso!');
    }
}