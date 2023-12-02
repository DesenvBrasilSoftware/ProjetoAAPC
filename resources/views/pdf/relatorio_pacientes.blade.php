<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Contas a Pagar</title>
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
	<h1>Relatório de Pacientes</h1>

  @if($data_inicial_cadastro)
  <h3>Data inicial cadastro: {{ date('d/m/Y', strtotime($data_inicial_cadastro)) }}</h3>
  @endif
  @if($data_final_cadastro)
  <h3>Data final cadstro: {{ date('d/m/Y', strtotime($data_final_cadastro)) }}</h3>
  @endif
  @if($data_inicial_nascimento)
  <h3>Data inicial nascimento: {{ date('d/m/Y', strtotime($data_inicial_nascimento)) }}</h3>
  @endif
  @if($data_final_nascimento)
  <h3>Data final nascimento: {{ date('d/m/Y', strtotime($data_final_nascimento)) }}</h3>
  @endif
  @if($data_inicial_obito)
  <h3>Data inicial obito: {{ date('d/m/Y', strtotime($data_inicial_obito)) }}</h3>
  @endif
  @if($data_final_obito)
  <h3>Data final obito: {{ date('d/m/Y', strtotime($data_final_obito)) }}</h3>
  @endif
  @if($cidade)
  <h3>Cidade: {{ $cidade }}</h3>
  @endif
	<table>
		<thead>
			<tr>
				<th>Paciente</th>
				<th>Data nascimento</th>
				<th>Data cadastro</th>
        @if($data_inicial_obito || $data_final_obito)
				<th>Data obito</th>
        @endif
        <th>Cidade</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lista as $item)
				<tr>
					<td>{{$item->paciente}}</td>
					<td>
            @if ($item->data_nascimento)
            {{ date('d/m/Y', strtotime($item->data_nascimento)) }}
            @endif
          </td>
					<td>
            @if ($item->data_cadastro)
            {{ date('d/m/Y', strtotime($item->data_cadastro)) }}
            @endif
          </td>
          @if($data_inicial_obito || $data_final_obito)
					<td>
          @if ($item->data_obito)
          {{ date('d/m/Y', strtotime($item->data_obito)) }}</td>
          @endif
          @endif
					<td>{{$item->cidade}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
