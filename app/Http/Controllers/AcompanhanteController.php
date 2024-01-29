<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Acompanhante;
use App\Models\Leito;
use App\Models\Pessoa;
use App\Models\LeitoAcompanhante;

class AcompanhanteController extends Controller
{
    public function index(Request $req)
    {
        $listaAcompanhante = Acompanhante::where('paciente_id', $req['id'])
            ->join('pessoa', 'acompanhante.pessoa_id', '=', 'pessoa.id')
            ->select('acompanhante.*', 'pessoa.nome as nome_acompanhante')
            ->get();

        return response()->json(['listaAcompanhante' => $listaAcompanhante]);
    }

    public function store(Request $req)
    {
        $acompanhante = new Acompanhante();

        $existingAcompanhante = Acompanhante::where('paciente_id', $req['paciente_id'])
            ->where('pessoa_id', $req['acompanhante_id'])
            ->first();

        if (!$existingAcompanhante) {
            $acompanhante->paciente_id = $req['paciente_id'];
            $acompanhante->pessoa_id = $req['acompanhante_id'];
        }

        $acompanhante->grau = $req['grau'];
        $acompanhante->profissao = $req['profissaoAcom'];
        $acompanhante->moradia = ($req['moraJunto'] === "on") ? 1 : 0;

        try {
            $acompanhante->save();
            $msg = 'Acompanhante salvo com sucesso.';
            return redirect('/paciente.edit.' . $req['paciente_id'])->with('mensagem', $msg);

        } catch (\Exception $e) {
            $msg = 'Erro ao salvar o acompanhante: ' . $e->getMessage();
            return redirect('/paciente.edit.' . $req['paciente_id'])->with('mensagem', $msg);
        }
    }

    public function adicionarAcomodacao(Request $request)
    {
        $leitoAcompanhante = new LeitoAcompanhante();
        $leito = Leito::find($request['leito_id']);
        if ($request['leito_acompanhante_id']) {
          $leitoAcompanhante = LeitoAcompanhante::find($request['leito_acompanhante_id']);
        }
        if($request['data_saida_id'] == null) {
          $leito->ocupado = '1';
        } else {
          $leito->ocupado = '0';
        }
        $leitoAcompanhante->acompanhante_id = $request['acompanhante_id'];
        $leitoAcompanhante->data_entrada = $request['data_entrada_id'];
        $leitoAcompanhante->data_saida = $request['data_saida_id'];
        $leitoAcompanhante->leito_id = $request['leito_id'];

        $leito->save();
        $leitoAcompanhante->save();

        return redirect('/pessoa.edit.' . $request->acompanhante_id)->with('mensagem', 'Acomodação do acompanhante adicionada com sucesso');
    }

    public function deletarAcomodacao(Request $request)
    {
        $obj = LeitoAcompanhante::find($request->delete_leito_acompanhante_id);
        $leito_id = $obj->leito_id;
        $data_saida = $obj->data_saida;
        $msg = "Acomodação do acompanhante excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a acomodação do acompanhante. ';
            return redirect('/pessoa.edit.' . $request->delete_acompanhante_id)->with('mensagem', $msg);
        }
        if($data_saida == null) {
          $leito = Leito::find($leito_id);
          $leito->ocupado = 0;
          $leito->save();
        }
        return redirect('/pessoa.edit.' . $request->delete_acompanhante_id)->with('mensagem', $msg);
    }

    public function delete($id)
    {
        $obj = Acompanhante::find($id);

        $msg = "Acompanhante excluído.";

        try {
            $obj->delete();
        } catch(\Exception $e) {
            $msg = 'Não foi possível excluir o acompanhante. ';

            return redirect()->back()->with('error', $msg);
        }

        return redirect()->back()->with('success', $msg);
    }
}
