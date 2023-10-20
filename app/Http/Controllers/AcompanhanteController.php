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
        $acompanhante->paciente_id = $req['pacienteId'];
        $acompanhante->pessoa_id = $req['acompanhanteId'];

        $existingAcompanhante = Acompanhante::where('paciente_id', $acompanhante->paciente_id)
            ->where('pessoa_id', $acompanhante->pessoa_id)
            ->first();

        if ($existingAcompanhante) {
            $msg = 'Este acompanhante já está associado a este paciente.';
            return response()->json(['message' => $msg], 400);
        }

        try {
            $acompanhante->save();

            $msg = 'Acompanhante salvo com sucesso.';
            return response()->json(['message' => $msg]);

        } catch (\Exception $e) {
            $msg = 'Erro ao salvar o acompanhante: ' . $e->getMessage();
            return response()->json(['message' => $msg], 400);
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
