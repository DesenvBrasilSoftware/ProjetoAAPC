<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GrupoItem;
use App\Models\KitItem;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($msg = '')
    {
        $lista = Item::orderBy('descricao')
        ->join('grupo_item', 'item.grupo_item_id', '=', 'grupo_item.id')
        ->leftJoin('medicamento', 'item.medicamento_id', '=', 'medicamento.id')
        ->select('item.*', 'grupo_item.descricao as grupo_item', 'medicamento.nome as medicamento')
        ->get();

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
        $obj->quantidade = $request['quantidade'];
        $obj->grupo_item_id = $request['grupo_item_id'];
        $obj->kit = isset($request['kit']) ? 1 : 0;
        $obj->medicamento_id = $request['medicamento_id'];

        $msg = 'Registro salvo com sucesso.';

        try {
            // Tenta salvar o objeto no banco de dados
            $obj->save();
        } catch (\Exception $e) {
          $msg = $e->getMessage();
          if ($request['id']) {
              return redirect('/item.edit.' . $obj->id)->with('error', $msg)->withInput();
          }
          return redirect('/item.create')->with('error', $msg)->withInput();
        }

        // Redireciona para a página de edição se estiver atualizando, caso contrário, volta para a página de criação
        if ($request['id']) {
            return redirect('/item.edit.' . $obj->id)->with('success', $msg);
        }

        return redirect('/item.create')->with('success', $msg);
    }


    public function edit(string $id, $msg = '')
    {
        $obj = Item::find($id);
        $listaGrupoItem = GrupoItem::all();
        $listaItem = Item::where('kit', '!=', 1)
        ->whereNotIn('id', [$id])
        ->get();
        $listaMedicamento = Medicamento::all();
        $listaKitItem = KitItem::join('item', 'kit_item.item_composicao_id', '=', 'item.id')
        ->where('kit_item.item_kit_id', '=', $id)
        ->select('kit_item.*', 'item.descricao as item')
        ->get();

        return view('item.edit', compact('listaGrupoItem', 'listaItem', 'listaKitItem', 'listaMedicamento', 'msg', 'obj'));
    }

    public function delete($id)
    {
        $obj = Item::find($id);
        $msg = "Item ({$obj->descricao}) excluído.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o item. ';
            return redirect('/item.index')->with('error', $msg);
        }
        return redirect('/item.index')->with('success', $msg);
    }

    public function adicionarItemKit(Request $request)
    {
      $kitItem = new KitItem();
      if ($request['kit_item_id']) {
        $kitItem = KitItem::find($request['kit_item_id']);
      }
      $kitItem->item_kit_id = $request['item_kit_id'];
      $kitItem->item_composicao_id = $request['item_composicao_id'];
      $kitItem->quantidade = $request['quantidade_item_composicao'];

      $kitItem->save();

      return redirect('/item.edit.' . $request->item_kit_id)->with('mensagem',
      'Item adicionado ao kit com sucesso');
    }
}
