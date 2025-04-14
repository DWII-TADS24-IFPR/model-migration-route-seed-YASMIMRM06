// app/Http/Controllers/CursoController.php
<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['nivel', 'eixo'])->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('cursos.create', compact('niveis', 'eixos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'total_horas' => 'required|integer|min:1',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id'
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso cadastrado com sucesso!');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('cursos.edit', compact('curso', 'niveis', 'eixos'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'total_horas' => 'required|integer|min:1',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')
            ->with('success', 'Curso removido com sucesso!');
    }
}