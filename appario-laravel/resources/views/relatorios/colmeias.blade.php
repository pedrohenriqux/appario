<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Apiários</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .small {
            font-size: 11px;
            color: #666;
        }

        .section {
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <h1>Relatório de colmeias</h1>
    @if ($pessoa)
        <h2>Responsável: {{ $pessoa->nome }}</h2>
    @else
        <h2>Responsável: Não informado</h2>
    @endif

    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>Especie</th>
                    <th>Tamanho</th>
                    <th>Data de Aquisição</th>
                    <th>Apiario Vinculado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colmeias as $colmeia)
                    <tr>
                        <td>{{ $colmeia->especie }}</td>
                        <td>{{ $colmeia->tamanho }}</td>
                        <td>{{ \Carbon\Carbon::parse($colmeia->data_aquisicao)->format('d/m/Y') }}</td>
                        <td>{{ $colmeia->apiario->nome ?? 'Nenhum encontrado' }}</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <strong>Endereço do Apiario:</strong>
                            {{ $colmeia->apiario->enderecos->logradouro ?? '---' }}, Nº {{ $colmeia->apiario->enderecos->numero ?? '---' }}
                            @if(!empty($colmeia->apiario->enderecos->complemento))
                                , {{ $colmeia->apiario->enderecos->complemento }}
                            @endif
                            - {{ $colmeia->apiario->enderecos->bairro ?? '---' }},
                            {{ $colmeia->apiario->enderecos->cidade ?? '---' }} - {{ $colmeia->apiario->enderecos->estado ?? '--' }},
                            CEP: {{ $colmeia->apiario->enderecos->cep ?? '--' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="small">Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>

</body>
</html>
