<?php
namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Aluno;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::with(['aluno', 'categoria'])
                         ->latest()
                         ->get();
        
        return view('comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();
        
        return view('comprovantes.create', compact('alunos', 'categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:500',
            'horas_validas' => 'required|integer|min:1',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:2048'
        ]);

        // Upload do arquivo
        $path = $request->file('arquivo')->store('comprovantes');

        Comprovante::create([
            'aluno_id' => $validated['aluno_id'],
            'categoria_id' => $validated['categoria_id'],
            'descricao' => $validated['descricao'],
            'horas_validas' => $validated['horas_validas'],
            'status' => Comprovante::STATUS_PENDENTE,
            'arquivo_path' => $path
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
        $alunos = Aluno::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();
        
        return view('comprovantes.edit', compact('comprovante', 'alunos', 'categorias'));
    }

    public function update(Request $request, Comprovante $comprovante)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:500',
            'horas_validas' => 'required|integer|min:1',
            'status' => 'required|in:pendente,aprovado,rejeitado',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,png|max:2048'
        ]);

        // Atualiza arquivo se fornecido
        if ($request->hasFile('arquivo')) {
            Storage::delete($comprovante->arquivo_path);
            $validated['arquivo_path'] = $request->file('arquivo')->store('comprovantes');
        }

        $comprovante->update($validated);

        return redirect()->route('comprovantes.index')
               ->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy(Comprovante $comprovante)
    {
        Storage::delete($comprovante->arquivo_path);
        $comprovante->delete();
        
        return redirect()->route('comprovantes.index')
               ->with('success', 'Comprovante removido com sucesso!');
    }

    /**
     * Aprova um comprovante
     */
    public function aprovar(Comprovante $comprovante)
    {
        $comprovante->update(['status' => Comprovante::STATUS_APROVADO]);
        
        return back()->with('success', 'Comprovante aprovado com sucesso!');
    }

    /**
     * Rejeita um comprovante
     */
    public function rejeitar(Comprovante $comprovante)
    {
        $comprovante->update(['status' => Comprovante::STATUS_REJEITADO]);
        
        return back()->with('success', 'Comprovante rejeitado com sucesso!');
    }
}