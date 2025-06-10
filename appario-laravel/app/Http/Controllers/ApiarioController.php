<?php

namespace App\Http\Controllers;

use App\Models\Apiario;
use Illuminate\Http\Request;

class ApiarioController extends Controller
{
    
    public function index()
    {
        $apiarios = Apiario::all();
        return view(('apiarios.listar'), compact('apiarios'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Apiario $apiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apiario $apiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Apiario $apiario)
    {
        $this->authorize('update', $apiario);
        $apiario->update($request->validated());
        return response()->json([
            'mensagem' => 'Apiário atualizado com sucesso',
            'data' => $apiario
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apiario $apiario)
    {
        //
    }
}
