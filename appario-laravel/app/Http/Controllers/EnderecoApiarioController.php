<?php

namespace App\Http\Controllers;

use App\Models\EnderecoApiario;
use Illuminate\Http\Request;
use App\Http\Requests\EnderecoApiario\StoreRequest;
use App\Http\Requests\EnderecoApiario\UpdateRequest;

class EnderecoApiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $enderecoApiario = EnderecoApiario::create($request->validated());

        return response()->json([
            'message' => 'Endereço do apiário cadastrado com sucesso!',
            'data' => $enderecoApiario
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EnderecoApiario $enderecos_apiarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnderecoApiario $enderecos_apiarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, EnderecoApiario $endereco)
    {
        $endereco->update($request->validated());

        return response()->json([
            'message' => 'Endereço do apiário atualizado com sucesso!',
            'data' => $endereco
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnderecoApiario $enderecos_apiarios)
    {
        //
    }
}
