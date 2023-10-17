<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GrupoItem;
use App\Models\Medicamento;
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
        $listaGrupoItem = GrupoItem::all();
        $listaMedicamento = Medicamento::all();

        return view('item.create', compact('listaGrupoItem', 'listaMedicamento', 'msg'));
    }

    public function store(Request $request)
    {
        // Cria um novo objeto Item
        $obj = new Item();

        // Verifica se está atualizando um registro existente
        if ($request['id']) {
            $obj = Item::find($request['id']);
        }

        // Preenche os campos do objeto com os dados do formulário
        $obj->descricao = $request['descricao'];
        $obj->grupo_item_id = $request['grupo_item_id'];
        $obj->fabricacao = $request['fabricacao'];
        $obj->validade = $request['validade'];
        $obj->kit = isset($request['kit']) ? 1 : 0;
        $obj->medicamento_id = $request['medicamento_id'];

        $msg = 'Registro salvo com sucesso.';

        try {
            // Tenta salvar o objeto no banco de dados
            $obj->save();
        } catch (\Exception $e) {
            // Em caso de erro, define a mensagem de erro e armazena os dados do formulário na sessão
            $msg = $e->getMessage(); // Obtém a mensagem de erro da exceção
            return redirect('/item.create')->with('error', $msg);
        }

        // Redireciona para a página de edição se estiver atualizando, caso contrário, volta para a página de criação
        if ($request['id']) {
            return redirect('/item.edit.' . $obj->id);
        }

        return redirect('/item.create')->with('success', $msg);
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
