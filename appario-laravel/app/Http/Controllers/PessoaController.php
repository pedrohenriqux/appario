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
        return view('pessoas.listar', compact('pessoas'));
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

        return redirect()->route('home')->with('success', 'Cadastro concluído com sucesso!');
    }

    public function show(Pessoa $pessoa)
    {
        $pessoa = load('enderecos', 'telefones');
        return view('pessoas.show', compact('pessoa'));
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(UpdateRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->validated());

        return redirect()->route('pessoas.show', $pessoa->id_pessoa)
            ->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function delete(Pessoa $pessoa)
    {
        return view('pessoas.destroy', compact('pessoa'));
    }

    public function destroy(Pessoa $pessoa)
    {
        // Deleta o usuário relacionado
        $pessoa->usuario->delete();

        // Deleta a pessoa
        $pessoa->delete();

        return redirect()->route('usuarios.create')->with('success', 'Pessoa e usuário excluídos com sucesso!');
    }

}