<?php

namespace App\Http\Controllers;

use App\Models\Apiario;
use Illuminate\Http\Request;

class ApiarioController extends Controller
{
    
    public function index()
    {
        $usuario = auth()->user();  
        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return response()->json(['mensagem' => 'Pessoa não encontrada para este usuário.'], 404);
        }
        $apiarios = Apiario::where('pessoa_id', $pessoa->id_pessoa)->get(); 
        return view(('apiarios.listar'), compact('apiarios'));
    }

    public function create()
    {
        return view('apiarios.inserir');
    }

    
    public function store(StoreRequest $request)
    {
        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return response()->json([
                'mensagem' => 'Pessoa não encontrada para este usuário.'
            ], 404);
        }

        $data = $request->validated();
        $data['pessoa_id'] = $pessoa->id_pessoa;
        $apiario = new Apiario($data);
        $this->authorize('create', $apiario);
        $apiario->save();

        return response()->json([
            'mensagem' => 'Apiário criado com sucesso',
            'data' => $apiario
        ], 201);

    }

    public function show(Apiario $apiario)
    {
        $this->authorize('view', $apiario);
        return response()->json($apiario);
    }

    public function edit(Apiario $apiario)
    {
        $this->authorize('update', $apiario);
        return view('apiarios.editar', compact('apiario'));
    }

    public function update(UpdateRequest $request, Apiario $apiario)
    {
        $this->authorize('update', $apiario);
        $apiario->update($request->validated());
        return response()->json([
            'mensagem' => 'Apiário atualizado com sucesso',
            'data' => $apiario
        ], 201);
    }

    public function destroy(Apiario $apiario)
    {
        $this->authorize('delete', $apiario);
        $apiario->delete();

        return response()->json([
            'mensagem' => 'Apiário removido com sucesso.'
        ]);
    }
}
