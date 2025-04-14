// app/Http/Controllers/DeclaracaoController.php
<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::with('aluno')->get();
        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        return view('declaracoes.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:declaracoes',
            'conteudo' => 'required|string',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        Declaracao::create($request->all());

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração cadastrada com sucesso!');
    }

    public function show(Declaracao $declaracao)
    {
        return view('declaracoes.show', compact('declaracao'));
    }

    public function edit(Declaracao $declaracao)
    {
        $alunos = Aluno::all();
        return view('declaracoes.edit', compact('declaracao', 'alunos'));
    }

    public function update(Request $request, Declaracao $declaracao)
    {
        $request->validate([
            'codigo' => 'required|string|unique:declaracoes,codigo,'.$declaracao->id,
            'conteudo' => 'required|string',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $declaracao->update($request->all());

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração atualizada com sucesso!');
    }

    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();
        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração removida com sucesso!');
    }
}