<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Controller para gerenciar categorias de atividades complementares
 */
class CategoriaController extends Controller
{
    /**
     * Exibe a lista de categorias
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Mostra o formulário para criar nova categoria
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Armazena uma nova categoria no banco de dados
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:categorias',
            'horas_maximas' => 'required|integer|min:1',
            'descricao' => 'nullable|string'
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')
               ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma categoria específica
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Mostra o formulário para editar uma categoria
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria no banco de dados
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:categorias,nome,'.$categoria->id,
            'horas_maximas' => 'required|integer|min:1',
            'descricao' => 'nullable|string'
        ]);

        $categoria->update($validated);

        return redirect()->route('categorias.index')
               ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove uma categoria (SoftDelete)
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        
        return redirect()->route('categorias.index')
               ->with('success', 'Categoria removida com sucesso!');
    }
}