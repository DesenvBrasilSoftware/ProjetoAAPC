<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Cidade;
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
        $cidades = Cidade::all();

        return view('bairro.create')->with(['cidades' => $cidades]);
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
            $msg = $e->getMessage();
            if ($request['id']) {
                return redirect('/bairro.edit.' . $obj->id)->with('error', $msg)->withInput();
            }
            return redirect('/bairro.create')->with('error', $msg)->withInput();
        }

        if ($request['id']) {
            return redirect('/bairro.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/bairro.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Bairro::find($id);
        $cidades = Cidade::all();

        return view('bairro.edit')->with(['msg' => $msg, 'obj' => $obj, 'cidades' => $cidades]);
    }

    public function delete($id)
    {
        $obj = Bairro::find($id);
        $msg = "Bairro ({$obj->nome}) excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o bairro. ';
            return redirect('/bairro.index')->with('error', $msg);
        }
        return redirect('/bairro.index')->with('success', $msg);
    }
}
