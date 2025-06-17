<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }

        .programacao {
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td>
                    <a href="{{ route('pessoas.show', $pessoa->id_pessoa) }}">
                        {{ $pessoa->nome }} {{ $pessoa->sobrenome }}
                    </a>
                </td>
                <td class="programacao">{{ $pessoa->cpf }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="{{ route('pessoas.create') }}">
            <button>Nova pessoa</button>
        </a>
    </div>
</body>

</html>