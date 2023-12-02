<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Cidade;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function financeiro()
    {
      $listaPessoa = Pessoa::orderBy('nome')->get();
      return view('relatorio.financeiro')->with(['listaPessoa' => $listaPessoa]);
    }
    public function pacientes()
    {
      $listaCidade = Cidade::orderBy('nome')->get();
      return view('relatorio.paciente')->with(['listaCidade' => $listaCidade]);
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
            $sql .= "FROM conta_a_pagar cp INNER JOIN pessoa p ON p.id = cp.pessoa_id ";
            $sql .= "WHERE 1 = 1";
        } else {
            $sql .= "SELECT cr.data, p.nome as pessoa, cr.valor_a_receber, cr.valor_recebido ";
            $sql .= "FROM conta_a_receber cr INNER JOIN pessoa p ON p.id = cr.pessoa_id ";
            $sql .= "WHERE 1 = 1";
        }

        if ($dataInicial) {
            $sql .= " AND data >= '{$dataInicial}'";
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

    public function relatorioPacientes(Request $request)
    {
        $dataInicialNascimento = $request['data_inicial_nascimento'];
        $dataFinalNascimento = $request['data_final_nascimento'];
        $dataInicialCadastro = $request['data_inicial_cadastro'];
        $dataFinalCadastro = $request['data_final_cadastro'];
        $dataInicialObito = $request['data_inicial_obito'];
        $dataFinalObito = $request['data_final_obito'];
        $cidadeId = $request['cidade_id'];

        $nomeCidade = "";
        $sql = "";

        if ($dataInicialObito !== '' || $dataFinalObito !== '') {
            $sql .= "SELECT p.nome as paciente, p.data_cadastro,
                     p.data_nascimento, p.data_obito, c.nome as cidade ";
            $sql .= "FROM paciente p INNER JOIN cidade c ON c.id = p.cidade_id ";
            $sql .= "WHERE 1 = 1";
        } else {
          $sql .= "SELECT p.nome as paciente, p.data_cadastro,
          p.data_nascimento, c.nome as cidade ";
          $sql .= "FROM paciente p INNER JOIN cidade c ON c.id = p.cidade_id ";
          $sql .= "WHERE 1 = 1";
        }

        if ($dataInicialNascimento) {
            $sql .= " AND data_nascimento >= '{$dataInicialNascimento}'";
        }
        if ($dataFinalNascimento) {
            $sql .= " AND data_nascimento <= '{$dataFinalNascimento}'";
        }
        if ($dataInicialCadastro) {
            $sql .= " AND data_cadastro >= '{$dataInicialCadastro}'";
        }
        if ($dataFinalCadastro) {
            $sql .= " AND data_cadastro <= '{$dataFinalCadastro}'";
        }
        if ($dataInicialObito) {
            $sql .= " AND data_obito >= '{$dataInicialObito}'";
        }
        if ($dataFinalObito) {
            $sql .= " AND data_obito <= '{$dataFinalObito}'";
        }

        if ($cidadeId) {
            $sql .= " AND c.id = '{$cidadeId}'";
            $nomeCidade = Cidade::find($cidadeId)->nome;
        }

        $lista = DB::select($sql);

        $pdf = PDF::loadView('pdf.relatorio_pacientes', [
            'lista' => $lista,
            'data_inicial_nascimento' => $dataInicialNascimento,
            'data_final_nascimento' => $dataFinalNascimento,
            'data_inicial_cadastro' => $dataInicialCadastro,
            'data_final_cadastro' => $dataFinalCadastro,
            'data_inicial_obito' => $dataInicialObito,
            'data_final_obito' => $dataFinalObito,
            'cidade' => $nomeCidade,
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('relatorio_pacientes.pdf');
    }
}
