// app/Http/Controllers/DocumentoController.php
<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('aluno')->get();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        return view('documentos.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $arquivo = $request->file('arquivo')->store('documentos');

        Documento::create([
            'tipo' => $request->tipo,
            'arquivo' => $arquivo,
            'aluno_id' => $request->aluno_id
        ]);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $alunos = Aluno::all();
        return view('documentos.edit', compact('documento', 'alunos'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $dados = $request->except('arquivo');

        if ($request->hasFile('arquivo')) {
            Storage::delete($documento->arquivo);
            $dados['arquivo'] = $request->file('arquivo')->store('documentos');
        }

        $documento->update($dados);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        Storage::delete($documento->arquivo);
        $documento->delete();
        return redirect()->route('documentos.index')
            ->with('success', 'Documento removido com sucesso!');
    }
}