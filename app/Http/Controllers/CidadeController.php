<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UF;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index($msg='')
    {
        $lista = Cidade::orderBy('nome')->get();
        $estado = UF::all();

        return view('cidade.index')->with(['lista' => $lista, 'estados' => $estado]);
    }

    public function create($msg = '')
    {
        $ufLista = UF::all();

        return view('cidade.create')->with(['estados' => $ufLista]);
    }

    public function store(Request $request)
    {
        $id = $request['id'];
        $obj = $id ? Cidade::find($id) : new Cidade();

        $obj->nome = $request['nome'];
        $obj->uf_id = $request['uf_id'];

        $msg = 'Registro salvo no banco de dados';

        try {
            $obj->save();

        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar a cidade no banco de dados.';

            session()->flashInput($request->input());
        }

        return redirect('/cidade.index')->with('msg', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Cidade::find($id);
        $ufLista = UF::all();

        return view('cidade.edit')->with(['msg' => $msg,'obj' => $obj, 'estados' => $ufLista]);
    }

    public function delete($id)
    {
        $obj = Cidade::find($id);

        $msg = "{$obj->nome} excluída.";

        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir a cidade.';
        }

        return redirect('/cidade.index')->with(['msg' => $msg]);
    }
}
