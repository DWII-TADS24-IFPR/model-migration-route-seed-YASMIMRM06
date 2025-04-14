// app/Http/Controllers/ComprovanteController.php
<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Aluno;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::with(['aluno', 'categoria'])->get();
        return view('comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $categorias = Categoria::all();
        return view('comprovantes.create', compact('alunos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'horas_validas' => 'required|integer|min:1',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $arquivo = $request->file('arquivo')->store('comprovantes');

        Comprovante::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'horas_validas' => $request->horas_validas,
            'arquivo' => $arquivo,
            'aluno_id' => $request->aluno_id,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante cadastrado com sucesso!');
    }

    public function show(Comprovante $comprovante)
    {
        return view('comprovantes.show', compact('comprovante'));
    }

    public function edit(Comprovante $comprovante)
    {
        $alunos = Aluno::all();
        $categorias = Categoria::all();
        return view('comprovantes.edit', compact('comprovante', 'alunos', 'categorias'));
    }

    public function update(Request $request, Comprovante $comprovante)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'horas_validas' => 'required|integer|min:1',
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $dados = $request->except('arquivo');

        if ($request->hasFile('arquivo')) {
            Storage::delete($comprovante->arquivo);
            $dados['arquivo'] = $request->file('arquivo')->store('comprovantes');
        }

        $comprovante->update($dados);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy(Comprovante $comprovante)
    {
        Storage::delete($comprovante->arquivo);
        $comprovante->delete();
        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante removido com sucesso!');
    }
}