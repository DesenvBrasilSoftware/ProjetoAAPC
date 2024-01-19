<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Estoque</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Relatório de Estoque</h1>

    @if($grupo_item_id)
    <h3>Grupo de Item ID: {{ $grupo_item_id }}</h3>
    @endif
    @if($medicamento_id)
    <h3>Medicamento ID: {{ $medicamento_id }}</h3>
    @endif
    @if($quantidade_minima)
    <h3>Quantidade Mínima: {{ $quantidade_minima }}</h3>
    @endif
    @if($quantidade_maxima)
    <h3>Quantidade Máxima: {{ $quantidade_maxima }}</h3>
    @endif
    @if($kit)
    <h3>Kit: {{ $kit ? 'Sim' : 'Não' }}</h3>
    @endif
    @if($nome_medicamento)
    <h3>Medicamento: {{ $nome_medicamento }}</h3>
    @endif
    @if($descricao_grupo_item)
    <h3>Grupo de Item: {{ $descricao_grupo_item }}</h3>
    @endif

    <table>
        <thead>
            <tr>
              <th>Grupo de Item</th>
              <th>Data de Fabricação</th>
              <th>Quantidade</th>
              <th>Medicamento</th>
              <th>Kit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lista as $item)
            <tr>
              <td>{{ $item->descricao_grupo_item }}</td>
              <td>{{ number_format($item->quantidade, 4, ',', '.') }}</td>
              <td>{{ $item->nome_medicamento }}</td>
              <td>{{ $item->kit ? 'Sim' : 'Não' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
