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
  @if($tipo_relatorio == 'contas_a_pagar')
	<h1>Relatório de Contas a Pagar</h1>
  @else
	<h1>Relatório de Contas a Receber</h1>
  @endif

  @if($data_inicial)
  <h3>Data inicial: {{ date('d/m/Y', strtotime($data_inicial)) }}</h3>
  @endif
  @if($data_final)
  <h3>Data final: {{ date('d/m/Y', strtotime($data_final)) }}</h3>
  @endif
  @if($pessoa)
  <h3>Pessoa: {{ $pessoa }}</h3>
  @endif
	<table>
		<thead>
			<tr>
				<th>Data</th>
				<th>Pessoa</th>
        @if($tipo_relatorio == 'contas_a_pagar')
				<th style="text-align: right">Valor a Pagar (R$)</th>
				<th style="text-align: right">Valor Pago (R$)</th>
        @else
				<th style="text-align: right">Valor a Receber (R$)</th>
				<th style="text-align: right">Valor Recebido (R$)</th>
        @endif
			</tr>
		</thead>
		<tbody>
			@foreach($lista as $item)
				<tr>
					<td>{{ date('d/m/Y', strtotime($item->data)) }}</td>
					<td>{{$item->pessoa}}</td>
          @if($tipo_relatorio == 'contas_a_pagar')
					<td style="text-align: right">{{ number_format($item->valor_a_pagar, 2, ',', '.') }}</td>
					<td style="text-align: right">{{ number_format($item->valor_pago, 2, ',', '.') }}</td>
          @else
					<td style="text-align: right">{{ number_format($item->valor_a_receber, 2, ',', '.') }}</td>
					<td style="text-align: right">{{ number_format($item->valor_recebido, 2, ',', '.') }}</td>
          @endif
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="total">Total (R$):</td>
        @if($tipo_relatorio == 'contas_a_pagar')
				<td class="total" style="text-align: right">{{ number_format($total_a_pagar, 2, ',', '.') }}</td>
        <td class="total" style="text-align: right">{{ number_format($total_pago, 2, ',', '.') }}</td>
        @else
				<td class="total" style="text-align: right">{{ number_format($total_a_receber, 2, ',', '.') }}</td>
        <td class="total" style="text-align: right">{{ number_format($total_recebido, 2, ',', '.') }}</td>
        @endif
			</tr>
		</tfoot>
	</table>
</body>
</html>
