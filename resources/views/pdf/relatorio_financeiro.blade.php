<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Contas a Pagar</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
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
	<h1>Relatório de Contas a Pagar</h1>
	<table>
		<thead>
			<tr>
				<th>Data</th>
				<th>Pessoa</th>
				<th style="text-align: right">Valor a Pagar</th>
				<th style="text-align: right">Valor Pago</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lista as $item)
				<tr>
					<td>{{ date('d/m/Y', strtotime($item->data)) }}</td>
					<td>{{$item->pessoa}}</td>
					<td style="text-align: right">{{$item->valor_a_pagar}}</td>
					<td style="text-align: right">{{$item->valor_pago}}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="total">Total:</td>
				<td class="total" style="text-align: right">{{$total_a_pagar}}</td>
        <td class="total" style="text-align: right">{{$total_pago}}</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>
