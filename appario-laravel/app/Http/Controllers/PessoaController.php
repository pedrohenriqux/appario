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

    public function create()
    {
        $usuario_id = session('usuario_id');

        if (!$usuario_id) {
            return redirect()->route('usuarios.create')->with(
                'error', 'É necessário cadastrar um usuário primeiro.'
            );
        }
        return view('pessoas.inserir', compact('usuario_id'));
    }

    public function store(StoreRequest $request)
    {
        $request->merge([
            'usuario_id' => session('usuario_id')
        ]);
        
        $dados = $request->validated();

        Pessoa::create($dados);

        // Limpa a sessão após o uso
        session()->forget('usuario_id');

        return redirect()->route('home')->with(
            'success', 'Cadastro concluído com sucesso!'
        );

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
