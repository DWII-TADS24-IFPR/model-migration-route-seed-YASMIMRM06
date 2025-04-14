<?php
namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::with('aluno')->latest()->get();
        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('declaracoes.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'conteudo' => 'required|string'
        ]);

        Declaracao::create([
            'aluno_id' => $validated['aluno_id'],
            'codigo' => Declaracao::gerarCodigo(),
            'conteudo' => $validated['conteudo'],
            'status' => Declaracao::STATUS_EMITIDA
        ]);

        return redirect()->route('declaracoes.index')
               ->with('success', 'Declaração emitida com sucesso!');
    }

    public function show(Declaracao $declaracao)
    {
        return view('declaracoes.show', compact('declaracao'));
    }

    public function cancelar(Declaracao $declaracao)
    {
        $declaracao->update(['status' => Declaracao::STATUS_CANCELADA]);
        
        return back()->with('success', 'Declaração cancelada com sucesso!');
    }

    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();
        return redirect()->route('declaracoes.index')
               ->with('success', 'Declaração removida com sucesso!');
    }
}