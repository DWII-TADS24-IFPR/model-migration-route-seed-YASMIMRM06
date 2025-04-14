// app/Http/Controllers/NivelController.php
<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::all();
        return view('niveis.index', compact('niveis'));
    }

    public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:niveis'
        ]);

        Nivel::create($request->all());

        return redirect()->route('niveis.index')
            ->with('success', 'Nível cadastrado com sucesso!');
    }

    public function show(Nivel $nivel)
    {
        return view('niveis.show', compact('nivel'));
    }

    public function edit(Nivel $nivel)
    {
        return view('niveis.edit', compact('nivel'));
    }

    public function update(Request $request, Nivel $nivel)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:niveis,nome,'.$nivel->id
        ]);

        $nivel->update($request->all());

        return redirect()->route('niveis.index')
            ->with('success', 'Nível atualizado com sucesso!');
    }

    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return redirect()->route('niveis.index')
            ->with('success', 'Nível removido com sucesso!');
    }
}