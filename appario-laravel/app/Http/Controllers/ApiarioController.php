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
        $apiarios = Apiario::with('enderecos')
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
        dd($apiario);
        $this->authorize('view', $apiario);

        // Para view web, você pode retornar uma view aqui, 
        // ou se não tiver, pode redirecionar para a lista
        return view('apiarios.show', compact('apiario'));
    }

    public function edit(Apiario $apiario)
    {
        $this->authorize('update', $apiario);
        $ufs = (new StoreRequest())->ufs();
        return view('apiarios.editar', compact('apiario', 'ufs'));
    }

    public function update(UpdateRequest $request, Apiario $apiario)
    {
        $this->authorize('update', $apiario);

        DB::beginTransaction();

        try {
            $apiario->update([
                'nome' => $request->input('nome', $apiario->nome),
                'area' => $request->input('area', $apiario->area),
                'coordenadas' => $request->input('coordenadas', $apiario->coordenadas),
                'data_criacao' => $request->input('data_criacao', $apiario->data_criacao),
            ]);

            $endereco = $apiario->enderecos; // use o relacionamento correto
            if ($endereco) {
                $endereco->update([
                    'logradouro' => $request->input('logradouro', $endereco->logradouro),
                    'numero' => $request->input('numero', $endereco->numero),
                    'complemento' => $request->input('complemento', $endereco->complemento),
                    'bairro' => $request->input('bairro', $endereco->bairro),
                    'cep' => $request->input('cep', $endereco->cep),
                    'cidade' => $request->input('cidade', $endereco->cidade),
                    'estado' => $request->input('estado', $endereco->estado),
                ]);
            }

            DB::commit();

            return redirect()->route('apiarios.index')
                ->with('success', 'Apiário e endereço atualizados com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao atualizar o apiário: ' . $e->getMessage()]);
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
