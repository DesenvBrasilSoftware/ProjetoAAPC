<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Acompanhante;

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
        $acompanhante->telefone = $req['telefone'];
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
