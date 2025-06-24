<?php

namespace App\Http\Controllers;

use App\Models\Colmeia;
use App\Models\Apiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Colmeia\StoreRequest;
use App\Http\Requests\Colmeia\UpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ColmeiaController extends Controller
{
    use AuthorizesRequests;

    /**
     * Lista todas as colmeias do apiario da pessoa do usuário logado
     */
    public function index()
    {
        $usuario = auth()->user();
        $this->authorize('viewAny', Colmeia::class);

        $pessoa = $usuario->pessoa;
        if (!$pessoa) {
            return redirect()->route('colmeias.index')
                ->with('error', 'Pessoa não encontrada para este usuário.');
        }

        // Busca as colmeias dos apiarios da pessoa
        $colmeias = Colmeia::with('apiario')
            ->whereHas('apiario', function ($query) use ($pessoa) {
                $query->where('pessoa_id', $pessoa->id_pessoa);
            })
            ->get();

        return view('colmeias.index', compact('colmeias'));
    }

    /**
     * Form para criar nova colmeia - precisa dos apiarios da pessoa para selecionar
     */
    public function create()
    {
        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return redirect()->route('colmeias.index')
                ->with('error', 'Pessoa não encontrada para este usuário.');
        }

        $apiarios = Apiario::where('pessoa_id', $pessoa->id_pessoa)->get();

        return view('colmeias.create', compact('apiarios'));
    }

    /**
     * Salvar nova colmeia associada a um apiario
     */
    public function store(StoreRequest $request)
    {
        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return redirect()->route('colmeias.index')
                ->with('error', 'Pessoa não encontrada para este usuário.');
        }

        $data = $request->validated();

        // Verifica se o apiario pertence à pessoa
        $apiario = Apiario::where('id_apiario', $data['apiario_id'])
            ->where('pessoa_id', $pessoa->id_pessoa)
            ->first();

        if (!$apiario) {
            return redirect()->route('colmeias.index')
                ->with('error', 'Apiário inválido ou não pertence ao usuário.');
        }

        DB::beginTransaction();

        try {
            $this->authorize('create', Colmeia::class);

            $colmeia = Colmeia::create([
                'especie' => $data['especie'],
                'tamanho' => $data['tamanho'],
                'data_aquisicao' => $data['data_aquisicao'],
                'apiario_id' => $data['apiario_id'],
            ]);

            DB::commit();

            return redirect()->route('colmeias.index')
                ->with('success', 'Colmeia criada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao criar a colmeia: ' . $e->getMessage()]);
        }
    }

    /**
     * Mostrar detalhes de uma colmeia
     */
    public function show(Colmeia $colmeia)
    {
        $this->authorize('view', $colmeia);

        return view('colmeias.show', compact('colmeia'));
    }

    /**
     * Form para editar colmeia
     */
    public function edit(Colmeia $colmeia)
    {
        $this->authorize('update', $colmeia);

        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        $apiarios = Apiario::where('pessoa_id', $pessoa->id_pessoa)->get();

        return view('colmeias.editar', compact('colmeia', 'apiarios'));
    }

    /**
     * Atualizar colmeia
     */
    public function update(UpdateRequest $request, Colmeia $colmeia)
    {
        $this->authorize('update', $colmeia);

        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        $data = $request->validated();

        // Verifica se o apiario pertence à pessoa
        $apiario = Apiario::where('id_apiario', $data['apiario_id'])
            ->where('pessoa_id', $pessoa->id_pessoa)
            ->first();

        if (!$apiario) {
            return redirect()->route('colmeias.index')
                ->with('error', 'Apiário inválido ou não pertence ao usuário.');
        }

        DB::beginTransaction();

        try {
            $colmeia->update([
                'especie' => $data['especie'],
                'tamanho' => $data['tamanho'],
                'data_aquisicao' => $data['data_aquisicao'],
                'apiario_id' => $data['apiario_id'],
            ]);

            DB::commit();

            return redirect()->route('colmeias.index')
                ->with('success', 'Colmeia atualizada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao atualizar a colmeia: ' . $e->getMessage()]);
        }
    }

    /**
     * Deletar colmeia
     */
    public function destroy(Colmeia $colmeia)
    {
        $this->authorize('delete', $colmeia);

        $colmeia->delete();

        return redirect()->route('colmeias.index')
            ->with('success', 'Colmeia removida com sucesso.');
    }
}
