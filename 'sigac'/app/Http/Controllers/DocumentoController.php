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
        $documentos = Documento::with('aluno')->latest()->get();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        $tipos = [
            Documento::TIPO_RG,
            Documento::TIPO_CPF,
            Documento::TIPO_HISTORICO,
            Documento::TIPO_COMPROVANTE
        ];
        
        return view('documentos.create', compact('alunos', 'tipos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'tipo' => 'required|string',
            'validade' => 'required|date',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:2048'
        ]);

        $path = $request->file('arquivo')->store('documentos');

        Documento::create([
            'aluno_id' => $validated['aluno_id'],
            'tipo' => $validated['tipo'],
            'validade' => $validated['validade'],
            'arquivo_path' => $path
        ]);

        return redirect()->route('documentos.index')
               ->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function download(Documento $documento)
    {
        return Storage::download($documento->arquivo_path);
    }

    public function destroy(Documento $documento)
    {
        Storage::delete($documento->arquivo_path);
        $documento->delete();
        
        return redirect()->route('documentos.index')
               ->with('success', 'Documento removido com sucesso!');
    }
}