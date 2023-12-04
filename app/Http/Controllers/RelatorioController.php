<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Cidade;
use App\Models\GrupoItem;
use App\Models\Medicamento;
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

    public function estoque(Request $request) {
      $listaGrupoItem = GrupoItem::orderBy('descricao')->get();
      $listaMedicamento = Medicamento::orderBy('nome')->get();
      return view('relatorio.estoque')->with(['listaGrupoItem' => $listaGrupoItem,
      'listaMedicamento' => $listaMedicamento]);
    }

    public function relatorioEstoque(Request $request) {
      $grupoItemId = $request['grupo_item_id'];
      $dataInicialFabricacao = $request['data_inicial_fabricacao'];
      $dataFinalFabricacao = $request['data_final_fabricacao'];
      $dataInicialValidade = $request['data_inicial_validade'];
      $dataFinalValidade = $request['data_final_validade'];
      $medicamentoId = $request['medicamento_id'];
      $quantidadeMin = $request['quantidade_minima'];
      $quantidadeMax = $request['quantidade_maxima'];
      $kit = ($request['kit'] == 'on') ? 1 : 0;

      $nomeMedicamento = "";
      $descricaoGrupoItem = "";

      // Início da consulta SQL
      $sql = "SELECT item.*, medicamento.nome AS nome_medicamento, grupo_item.descricao AS descricao_grupo_item
              FROM item
              LEFT JOIN medicamento ON item.medicamento_id = medicamento.id
              LEFT JOIN grupo_item ON item.grupo_item_id = grupo_item.id
              WHERE 1";

      if ($grupoItemId) {
          $sql .= " AND item.grupo_item_id = $grupoItemId";
      }

      if ($dataInicialFabricacao) {
          $sql .= " AND item.data_fabricacao >= '$dataInicialFabricacao'";
      }

      if ($dataFinalFabricacao) {
          $sql .= " AND item.data_fabricacao <= '$dataFinalFabricacao'";
      }

      if ($dataInicialValidade) {
          $sql .= " AND item.data_validade >= '$dataInicialValidade'";
      }

      if ($dataFinalValidade) {
          $sql .= " AND item.data_validade <= '$dataFinalValidade'";
      }

      if ($medicamentoId) {
          $sql .= " AND item.medicamento_id = $medicamentoId";
      }

      if ($quantidadeMin !== null) {
          $sql .= " AND item.quantidade >= $quantidadeMin";
      }

      if ($quantidadeMax !== null) {
          $sql .= " AND item.quantidade <= $quantidadeMax";
      }

      if ($kit !== null) {
          $sql .= " AND item.kit = $kit";
      }

      $lista = DB::select($sql);

      if ($grupoItemId) {
        $sql .= " AND item.grupo_item_id = $grupoItemId";
        $descricaoGrupoItem = GrupoItem::find($grupoItemId)->descricao;
      }

      if ($medicamentoId) {
        $sql .= " AND item.medicamento_id = $medicamentoId";
        $nomeMedicamento = Medicamento::find($medicamentoId)->nome;
      }

      $pdf = PDF::loadView('pdf.relatorio_estoque', [
        'lista' => $lista,
        'grupo_item_id' => $grupoItemId,
        'data_inicial_fabricacao' => $dataInicialFabricacao,
        'data_final_fabricacao' => $dataFinalFabricacao,
        'data_inicial_validade' => $dataInicialValidade,
        'data_final_validade' => $dataFinalValidade,
        'medicamento_id' => $medicamentoId,
        'quantidade_minima' => $quantidadeMin,
        'quantidade_maxima' => $quantidadeMax,
        'kit' => $kit,
        'nome_medicamento' => $nomeMedicamento,
        'descricao_grupo_item' => $descricaoGrupoItem,
      ]);

      $pdf->setPaper('A4', 'portrait');

      return $pdf->download('relatorio_estoque.pdf');
    }
}
