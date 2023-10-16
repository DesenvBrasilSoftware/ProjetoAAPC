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

        try {
            // Tenta salvar o objeto no banco de dados
            $obj->save();
            $msg = 'Registro salvo com sucesso.';
        } catch (\Exception $e) {
            // Em caso de erro, define a mensagem de erro e armazena os dados do formulário na sessão
            $msg = $e->getMessage(); // Obtém a mensagem de erro da exceção
            session()->flash('error', $msg);
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
