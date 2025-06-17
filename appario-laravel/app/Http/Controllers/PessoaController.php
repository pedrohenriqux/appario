<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\Pessoa\StoreRequest;
use App\Http\Requests\Pessoa\UpdateRequest;


class PessoaController extends Controller
{

    public function index()
    {
        $pessoas = Pessoa::all();
        return view(('pessoas.listar'), compact('pessoas'));
    }

    public function store(StoreRequest $request)
    {
        $pessoa = Pessoa::create($request->validated());

        return response()->json([
            'message' => 'Pessoa cadastrada com sucesso!',
            'data' => $pessoa
        ], 201);
    }

    public function update(UpdateRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->validated());

        return response()->json([
            'message' => 'Pessoa atualizada com sucesso!',
            'data' => $pessoa
        ]);
    }
}
