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

    <h1>Relatório de Apiários</h1>
    <h2>Responsável: {{ $pessoa->nome }}</h2>

    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Área (ha)</th>
                    <th>Data de Criação</th>
                    <th>Coordenadas</th>
                    <th>Qtd. Colmeias</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apiarios as $apiario)
                    <tr>
                        <td>{{ $apiario->nome }}</td>
                        <td>{{ number_format($apiario->area, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($apiario->data_criacao)->format('d/m/Y') }}</td>
                        <td>{{ $apiario->coordenadas ?? 'Não informado' }}</td>
                        <td>{{ $apiario->colmeias->count() }}</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <strong>Endereço:</strong>
                            {{ $apiario->enderecos->logradouro ?? '---' }}, Nº {{ $apiario->enderecos->numero ?? '---' }}
                            @if(!empty($apiario->enderecos->complemento))
                                , {{ $apiario->enderecos->complemento }}
                            @endif
                            - {{ $apiario->enderecos->bairro ?? '---' }},
                            {{ $apiario->enderecos->cidade ?? '---' }} - {{ $apiario->enderecos->estado ?? '--' }},
                            CEP: {{ $apiario->enderecos->cep ?? '--' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="small">Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>

</body>
</html>
