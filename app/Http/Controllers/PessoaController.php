<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index')->with('pessoas', $pessoas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Pessoa::create([
        //     'nome' => $request->nome,
        //     'idade' => $request->idade,
        //     'cpf' => $request->cpf,
        // ]);

        // DB::table('pessoas')->insert([
        //     'nome' => $request->nome,
        //     'idade' => $request->idade,
        //     'cpf' => $request->cpf,
        // ]);

        //Pessoa::create($request->all());

        $nome = $request->nome;
        $idade = $request->idade;
        $cpf = $request->cpf;

        $pessoa = new Pessoa();
        $pessoa->nome = $nome;
        $pessoa->idade = $idade;
        $pessoa->cpf = $cpf;

        $pessoa->save();

        // return view('pessoas.index');
        return redirect()->route('pessoas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
