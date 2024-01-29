<?php

namespace App\Http\Controllers;

use App\Models\Acomodacao;
use App\Models\Leito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcomodacaoController extends Controller
{
    public function index($msg = '')
    {
        $lista = Acomodacao::orderBy('descricao')->get();
        return view('acomodacao.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('acomodacao.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Acomodacao();
        if ($request['id']) {
            $obj = Acomodacao::find($request['id']);
        }
        $obj->descricao = $request['descricao'];
        $obj->refrigerado = isset($request['refrigerado']) ? 1 : 0;

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if ($request['id']) {
                return redirect('/acomodacao.edit.' . $obj->id)->with('error', $msg)->withInput();
            }
            return redirect('/acomodacao.create')->with('error', $msg)->withInput();
        }

        if ($request['id']) {
            return redirect('/acomodacao.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/acomodacao.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
      $obj = Acomodacao::find($id);

      $listaLeitosAcomodacao = DB::select("
      SELECT
        l.id,
        l.descricao,
        l.ocupado,
        COALESCE(p.nome, a.nome) as nome_pessoa,
        CASE
            WHEN p.id IS NOT NULL THEN 'Paciente'
            WHEN a.id IS NOT NULL THEN 'Acompanhante'
        END as perfil
      FROM
          leito l
        LEFT JOIN leito_paciente lp ON l.id = lp.leito_id
        LEFT JOIN paciente p ON lp.paciente_id = p.id
        LEFT JOIN leito_acompanhante la ON l.id = la.leito_id
        LEFT JOIN pessoa a ON la.acompanhante_id = a.id
      WHERE
          lp.data_saida IS NULL AND
          l.acomodacao_id =:acomodacao_id
      ", ['acomodacao_id' => $id]);

        return view(
          'acomodacao.edit',
          compact(
              'obj',
              'listaLeitosAcomodacao',
          )
      );
    }

    public function delete($id)
    {
      $obj = Acomodacao::find($id);
      $msg = "Acomodação ({$obj->descricao}) excluída.";
      try {
        $obj->delete();
      } catch (\Exception $e) {
        $msg = 'Não foi possível excluir a acomodação. ';
        return redirect('/acomodacao.index')->with('error', $msg);
      }
      return redirect('/acomodacao.index')->with('success', $msg);
    }

    public function adicionarLeito(Request $request)
    {
      $leitoAcomodacao = new Leito();
        if ($request['leito_id']) {
          $leitoAcomodacao = Leito::find($request['leito_id']);
        }
        $leitoAcomodacao->descricao = $request['descricao_leito'];
        $leitoAcomodacao->acomodacao_id = $request['acomodacao_id'];

        $leitoAcomodacao->save();

        return redirect('/acomodacao.edit.' . $request->acomodacao_id)->with('mensagem',
        'Leito cadastrado com sucesso');
    }

    public function deletarLeito(Request $request)
    {
        $obj = Leito::find($request->delete_leito_id);
        $msg = "Leito excluído.";
        try {
            $obj->delete();
          } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o leito.';
            if ($obj->ocupado) {
              $msg = 'Não foi possível excluir o leito, pois está ocupado por um paciente.';
            }
            return redirect('/acomodacao.edit.' . $request->delete_acomodacao_leito_id)->with('error', $msg);
        }
        return redirect('/acomodacao.edit.' . $request->delete_acomodacao_leito_id)->with('mensagem', $msg);
    }
}
