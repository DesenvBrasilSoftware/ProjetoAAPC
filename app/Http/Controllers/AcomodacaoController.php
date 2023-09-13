<?php

namespace App\Http\Controllers;

use App\Models\Acomodacao;
use Illuminate\Http\Request;

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
        $obj->acomodacao_paciente_id = $request['acomodacao_paciente_id'];
        $obj->descricao = $request['descricao'];
        $obj->leitos = $request['leitos'];
        $obj->leitos_livres = $request['leitos_livres'];
        $obj->refrigerado = $request['refrigerado'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/acomodacao.edit.' . $obj->id);
        }
        return redirect('acomodacao.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Acomodacao::find($id);
        return view('acomodacao.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Acomodacao::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a acomodação. ';
        }
        return redirect('/acomodacao.index')->with(['msg' => $msg]);
    }
}
