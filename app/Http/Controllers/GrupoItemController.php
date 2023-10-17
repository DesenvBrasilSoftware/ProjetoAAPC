<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use App\Models\Item;
use Illuminate\Http\Request;

class GrupoItemController extends Controller
{
    public function index($msg = '')
    {
        $lista = GrupoItem::orderBy('descricao')->get();
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
        $obj->perecivel = isset($request['perecivel']) ? 1 : 0;
        $obj->refrigerado = isset($request['refrigerado']) ? 1 : 0;

        $msg = 'Registro salvo com sucesso.';

        try {
            // Tenta salvar o objeto no banco de dados
            $obj->save();
        } catch (\Exception $e) {
            // Em caso de erro, define a mensagem de erro e armazena os dados do formulário na sessão
            $msg = $e->getMessage(); // Obtém a mensagem de erro da exceção
            return redirect('/grupoItem.create')->with('error', $msg);
        }

        if ($request['id']) {
            return redirect('/grupoItem.edit.' . $obj->id)->with('success', $msg);
        }

        return redirect('/grupoItem.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $grupo_item = GrupoItem::find($id);

        return view('grupoItem.edit', compact('msg', 'grupo_item'));
    }

    public function delete($id)
    {
        $obj = GrupoItem::find($id);
        $msg = "Grupo de item ({$obj->descricao}) excluído.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o Grupo de item. ';
        }
        return redirect('/grupoItem.index')->with('success', $msg);
    }
}
