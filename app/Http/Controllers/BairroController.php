<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    public function index($msg = '')
    {
        $lista = Bairro::orderBy('nome')
        ->join('cidade', 'bairro.cidade_id', '=', 'cidade.id')
        ->select('bairro.*', 'cidade.nome as cidade')
        ->get();

        return view('bairro.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('bairro.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Bairro();
        if ($request['id']) {
            $obj = Bairro::find($request['id']);
        }
        $obj->nome = $request['nome'];
        $obj->cidade_id = $request['cidade_id'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/bairro.edit.' . $obj->id);
        }
        return redirect('/bairro.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Bairro::find($id);
        return view('bairro.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Bairro::find($id);
        $msg = "{$obj->nome} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o bairro. ';
        }
        return redirect('/bairro.index')->with(['msg' => $msg]);
    }
}
