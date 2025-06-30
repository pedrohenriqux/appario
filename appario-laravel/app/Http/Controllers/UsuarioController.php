<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\Usuario\StoreRequest;
use App\Http\Requests\Usuario\UpdateRequest;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.listar', compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.create');
    }


    public function store(StoreRequest $request)
    {
        $dados = $request->validated();

        $usuario = Usuario::create([
            'email' => $dados['email'],
            'password' => bcrypt($dados['password']),
            'tipo' => 'PESSOA'
        ]);

        $usuario->pessoa()->create([
            'nome' => $dados['nome'],
            'sobrenome' => $dados['sobrenome'],
            'cpf' => $dados['cpf'],
            'tipo' => $dados['tipo'], // se "tipo" é da pessoa, pegue do $dados também
        ]);

        return redirect()->route('dashboard')->with('success', 'Usuário e pessoa cadastrados com sucesso!');
    }

    /**
     * Display the specifieid resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    public function update(UpdateRequest $request, Usuario $usuario)
    {
        $usuario->update($request->validate());

        return response()->json([
            'message' => 'Usuário atualizado com sucesso!',
            'data' => $usuario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
