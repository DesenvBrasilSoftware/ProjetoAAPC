<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Contato;

class ContatoController extends Controller
{
    public function index(Request $req)
    {
        $listaContato = Contato::where('paciente_id', $req['id'])
            ->join('pessoa', 'contato.pessoa_id', '=', 'pessoa.id')
            ->select('contato.*', 'pessoa.nome as nome_contato')
            ->get();

        return response()->json(['listaContato' => $listaContato]);
    }

    public function store(Request $req)
    {
        $contato = new Contato();
        $contato->paciente_id = $req['pacienteId'];
        $contato->pessoa_id = $req['contatoId'];

        $existingContato = Contato::where('paciente_id', $contato->paciente_id)
            ->where('pessoa_id', $contato->pessoa_id)
            ->first();

        if ($existingContato) {
            $msg = 'Este contato já está associado a este paciente.';
            return response()->json(['message' => $msg], 400);
        }

        try {
            $contato->save();

            $msg = 'Contato salvo com sucesso.';
            return response()->json(['message' => $msg]);

        } catch (\Exception $e) {
            $msg = 'Erro ao salvar o contato: ' . $e->getMessage();
            return response()->json(['message' => $msg], 400);
        }
    }


    public function delete($id)
    {
        $obj = Contato::find($id);

        $msg = "Contato excluído.";

        try {
            $obj->delete();
        } catch(\Exception $e) {
            $msg = 'Não foi possível excluir o contato. ';

            return redirect()->back()->with('error', $msg);
        }

        return redirect()->back()->with('success', $msg);
    }
}
