<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use App\Models\Item;
use Illuminate\Http\Request;

class GrupoItemController extends Controller
{
    public function index($msg = '')
    {
        $lista = Item::orderBy('descricao')->get();
        return view('grupoItem.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('grupoItem.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new GrupoItem();
        if ($request['id']) {
            $obj = GrupoItem::find($request['id']);
        }
        $obj->descricao = $request['descricao'];
        $obj->perecivel = $request['perecivel'];
        $obj->refrigerado = $request['refrigerado'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/grupoItem.edit.' . $obj->id);
        }
        return redirect('/grupoItem.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = GrupoItem::find($id);
        return view('grupoItem.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = GrupoItem::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o Grupo de item. ';
        }
        return redirect('/grupoItem.index')->with(['msg' => $msg]);
    }
}
