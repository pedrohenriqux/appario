<?php

namespace App\Http\Controllers;

use App\Models\telefone;
use Illuminate\Http\Request;
use App\Http\Request\telefone\StoreRequest;

class Telefone extends Controller
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
        $telefones = Telefone::create($request->validated());

        return redirect()->route('pessoa.show')
            ->with("Sucesso", "Telefone adicionado com sucesso");
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
    public function update(Request $request, Telefone $telefone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telefone $telefone)
    {
        
    }
}
