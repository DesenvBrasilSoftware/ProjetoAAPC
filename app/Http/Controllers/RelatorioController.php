<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function financeiro()
    {
      $listaPessoa = Pessoa::orderBy('nome')->get();
      return view('relatorio.financeiro')->with(['listaPessoa' => $listaPessoa]);
    }

    public function relatorioFinanceiro(Request $request)
    {
        $tipoRelatorio = $request['tipo_relatorio'];
        $dataInicial = $request['data_inicial'];
        $dataFinal = $request['data_final'];
        $pessoaId = $request['pessoa_id'];

        $nomePessoa = "";
        $sql = "";

        if ($tipoRelatorio == 'contas_a_pagar') {
            $sql .= "SELECT cp.data, p.nome as pessoa, cp.valor_a_pagar, cp.valor_pago ";
            $sql .= "FROM conta_a_pagar cp INNER JOIN pessoa p ON p.id = cp.pessoa_id";
        } else {
            $sql .= "SELECT cr.data, p.nome as pessoa, cr.valor_a_receber, cr.valor_recebido ";
            $sql .= "FROM conta_a_receber cr INNER JOIN pessoa p ON p.id = cr.pessoa_id";
        }

        if ($dataInicial) {
            $sql .= " WHERE data >= '{$dataInicial}'";
        }

        if ($dataFinal) {
            $sql .= " AND data <= '{$dataFinal}'";
        }

        if ($pessoaId) {
            $sql .= " AND p.id = '{$pessoaId}'";
            $nomePessoa = Pessoa::find($pessoaId)->nome;
        }

        $lista = DB::select($sql);

        $valorTotalPagar = 0;
        $valorTotalPago = 0;
        $valorTotalReceber = 0;
        $valorTotalRecebido = 0;

        foreach ($lista as $item) {
            $valorTotalPagar += $item->valor_a_pagar ?? 0;
            $valorTotalPago += $item->valor_pago ?? 0;
            $valorTotalReceber += $item->valor_a_receber ?? 0;
            $valorTotalRecebido += $item->valor_recebido ?? 0;
        }

        $valorTotalPagar = number_format($valorTotalPagar, 2, '.', '');
        $valorTotalPago = number_format($valorTotalPago, 2, '.', '');

        $pdf = PDF::loadView('pdf.relatorio_financeiro', [
            'lista' => $lista,
            'data_inicial' => $dataInicial,
            'data_final' => $dataFinal,
            'pessoa' => $nomePessoa,
            'tipo_relatorio' => $tipoRelatorio,
            'total_a_pagar' => $valorTotalPagar,
            'total_pago' => $valorTotalPago,
            'total_a_receber' => $valorTotalReceber,
            'total_recebido' => $valorTotalRecebido,
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('relatorio_financeiro.pdf');
    }
}
