<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GrupoItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($msg = '')
    {
        $lista = Item::orderBy('descricao')->get();
        return view('item.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('item.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Item();
        if ($request['id']) {
            $obj = Item::find($request['id']);
        }
        $obj->grupo_item_id = $request['grupo_item_id'];
        $obj->descricao = $request['descricao'];
        $obj->fabricacao = $request['fabricacao'];
        $obj->validade = $request['validade'];
        $obj->kit = $request['kit'];
        $obj->medicamento_id = $request['medicamento_id'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/item.edit.' . $obj->id);
        }
        return redirect('/item.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Item::find($id);
        return view('item.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Item::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o item. ';
        }
        return redirect('/item.index')->with(['msg' => $msg]);
    }
}
