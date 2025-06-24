<?php

namespace App\Http\Controllers;

use App\Models\Apiario;
use App\Models\EnderecoApiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Apiario\StoreRequest;
use App\Http\Requests\Apiario\UpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiarioController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $usuario = auth()->user();  
        $this->authorize('viewAny', Apiario::class);

        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return redirect()->route('apiarios.index')
                ->with('error', 'Pessoa não encontrada para este usuário.');
        }

        // Aqui carregamos endereço e contagem de colmeias
        $apiarios = Apiario::with('endereco')
            ->where('pessoa_id', $pessoa->id_pessoa)
            ->get();

        return view('apiarios.listar', compact('apiarios'));
    }

    public function create()
    {
        $ufs = (new StoreRequest())->ufs();
        return view('apiarios.adicionar', compact('ufs'));
    }

    public function store(StoreRequest $request)
    {
        $usuario = auth()->user();
        $pessoa = $usuario->pessoa;

        if (!$pessoa) {
            return redirect()->route('apiarios.index')
                ->with('error', 'Pessoa não encontrada para este usuário.');
        }

        $data = $request->validated();
        $data['pessoa_id'] = $pessoa->id_pessoa;

        DB::beginTransaction();

        try {
            $this->authorize('create', Apiario::class);

            $apiario = Apiario::create([
                'nome' => $data['nome'],
                'area' => $data['area'],
                'coordenadas' => $data['coordenadas'],
                'data_criacao' => $data['data_criacao'],
                'pessoa_id' => $data['pessoa_id'],
            ]);
                //dd($apiario->id_apiario);

            EnderecoApiario::create([
                'logradouro' => $data['logradouro'],
                'numero' => $data['numero'],
                'complemento' => $data['complemento'] ?? null,
                'bairro' => $data['bairro'],
                'cep' => $data['cep'],
                'cidade' => $data['cidade'],
                'estado' => $data['estado'],
                'apiario_id' => $apiario->id_apiario,
            ]);

            DB::commit();

            return redirect()->route('apiarios.index')
                ->with('success', 'Apiário e endereço criados com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao criar o apiário: ' . $e->getMessage()]);
        }
    }

   public function show(Apiario $apiario)
{
    $this->authorize('view', $apiario);

    // Carregar endereço associado (evita N+1 e facilita na view)
    $apiario->load('endereco');

    return view('apiarios.mostrar', compact('apiario'));
}

    public function edit(Apiario $apiario)
    {
        $this->authorize('update', $apiario);
        $ufs = (new StoreRequest())->ufs();
        $endereco = $apiario->endereco;

        return view('apiarios.editar', compact('apiario', 'endereco', 'ufs'));
    }

    public function update(Request $request, Apiario $apiario)
{
    $this->authorize('update', $apiario);

    // Validação dos dados recebidos do formulário
    $request->validate([
        'nome' => 'required|string|max:255',
        'data_criacao' => 'required|date',
        'area' => 'required|numeric|min:0',
        'coordenadas' => 'nullable|string',
        'estado' => 'required|string|max:2',
        'cidade' => 'required|string|max:255',
        'logradouro' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'complemento' => 'nullable|string|max:255',
        'bairro' => 'required|string|max:255',
        'cep' => 'required|string|max:10',
    ]);

    DB::beginTransaction();

    try {
        // 🔄 Atualiza os dados principais do apiário
        $apiario->update([
            'nome' => $request->input('nome'),
            'area' => $request->input('area'),
            'coordenadas' => $request->input('coordenadas'),
            'data_criacao' => $request->input('data_criacao'),
        ]);

        // 📍 Atualiza ou cria o endereço vinculado ao apiário
        $endereco = $apiario->endereco()->first();

        $enderecoData = $request->only([
            'logradouro',
            'numero',
            'complemento',
            'bairro',
            'cep',
            'cidade',
            'estado',
        ]);

        if ($endereco) {
            $endereco->update($enderecoData);
        } else {
            $apiario->endereco()->save(new \App\Models\EnderecoApiario($enderecoData));
        }

        DB::commit();

        return redirect()
            ->route('apiarios.index')
            ->with('success', 'Apiário e endereço atualizados com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'error' => 'Erro ao atualizar o apiário: ' . $e->getMessage()
            ]);
    }
}


    public function destroy(Apiario $apiario)
    {
        $this->authorize('delete', $apiario);
        $apiario->delete();

        return redirect()->route('apiarios.index')
            ->with('success', 'Apiário removido com sucesso.');
    }
}
