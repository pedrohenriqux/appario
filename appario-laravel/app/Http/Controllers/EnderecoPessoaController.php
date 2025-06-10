<?php

namespace App\Http\Controllers;

use App\Models\EnderecoPessoa;
use Illuminate\Http\Request;
use App\Http\Requests\EnderecoPessoa\StoreRequest;
use App\Http\Requests\EnderecoPessoa\UpdateRequest;

class EnderecoPessoaController extends Controller
{
    
    public function index()
    {
        $enderecosPessoas = EnderecoPessoa::all();
        return view('enderecosPessoas.listar', compact('enderecosPessoas'));
    }

    public function create()
    {
        
    }

    public function store(StoreRequest $request)
    {
        $enderecoPessoa = EnderecoPessoa::create($request->validated());

        return response()->json([
            'message' => 'Endereço cadastrado com sucesso!',
            'data' => $enderecoPessoa
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EnderecoPessoa $enderecos_pessoas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnderecoPessoa $enderecos_pessoas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, EnderecoPessoa $enderecos_pessoas)
    {
        $enderecos_pessoas->update($request->validated());

        return response()->json([
            'message' => 'Endereço atualizado com sucesso!',
            'data' => $enderecos_pessoas
        ]);
    }

    public function destroy(EnderecoPessoa $enderecos_pessoas)
    {
        //
    }
}
