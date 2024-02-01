<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaidaConsumo;
use App\Models\SaidaConsumoItem;
use App\Models\Pessoa;
use App\Models\KitItem;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class SaidaConsumoController extends Controller
{
    public function index($msg='')
    {
        $lista = DB::select("
        SELECT
            sd.id,
            sd.data,
            p.nome as usuario
        FROM
            saida_consumo sd
            INNER JOIN usuario p
            ON p.id = sd.usuario_id
        ");

        return view('saidaConsumo.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('saidaConsumo.create', compact('msg',));
    }

    public function store(Request $request)
    {
        $obj = new SaidaConsumo();
        if ($request['id']) {
            $obj = SaidaConsumo::find($request['id']);
        }
        $obj->usuario_id = $request['usuario_id'];
        $obj->data = $request['data'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']){
            return redirect('/saidaConsumo.edit.'.$obj->id);
        }

        return redirect('/saidaConsumo.edit.'.$obj->id);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = SaidaConsumo::find($id);
        $listaPessoa = Pessoa::all();
        $listaItem = Item::all();
        $listaSaidaConsumoItem = DB::select("
            SELECT
                sdi.id,
                sdi.quantidade,
                i.id as item_id,
                i.descricao as item
            FROM
                saida_consumo_item sdi
                INNER JOIN item i
                ON i.id = sdi.item_id
            WHERE
                saida_consumo_id = :saida_consumo_id
        ", ['saida_consumo_id' => $id]);

        return view('saidaConsumo.edit', compact('listaItem', 'listaSaidaConsumoItem', 'listaPessoa','obj', 'msg',));
    }

    public function delete($id)
    {
        $obj = SaidaConsumo::find($id);
        $msg = "Doação excluída.";
        try {
            $obj->delete();
        } catch (\PDOException $e) {
            // Verifica se a exceção é devido a uma violação de chave estrangeira
            if (strpos($e->getMessage(), 'Integrity constraint violation') !== false) {
                $msg = 'Não é possível excluir a doação, pois existem itens cadastrados nessa saída de doação. Remova os itens antes de excluí-la.';
            } else {
                $msg = 'Não foi possível excluir a doação.';
            }
            return redirect('/saidaConsumo.index')->with(['error' => $msg]);
        }
        return redirect('/saidaConsumo.index')->with(['success' => $msg]);
    }

    public function deletarItem(Request $request)
    {
        $obj = SaidaConsumoItem::find($request->delete_saida_consumo_item_id);

        $item = Item::find($obj->item_id);
        $item->quantidade += $obj->quantidade;
        $item->save();

        $msg = "Item da doação excluído excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o item da doação. ';
            return redirect('/saidaConsumo.edit.' . $request->delete_saida_consumo_id)->with('mensagem', $msg);
        }
        return redirect('/saidaConsumo.edit.' . $request->delete_saida_consumo_id)->with('mensagem', $msg);
    }

    public function adicionarItem(Request $request)
    {
        $saidaConsumoItem = new SaidaConsumoItem();
        if ($request['saida_consumo_item_id']) {
            $saidaConsumoItem = SaidaConsumoItem::find($request['saida_consumo_item_id']);
        }
        $novaQuantidade = $request['quantidade'];
        $antigaQuantidade = $saidaConsumoItem->quantidade;

        $saidaConsumoItem->saida_consumo_id = $request['saida_consumo_id'];
        $saidaConsumoItem->item_id = $request['item_id'];
        $saidaConsumoItem->quantidade = $novaQuantidade;

        $saidaConsumoItem->save();

        if ($request['saida_consumo_item_id']) {
          // Edição da quantidade
          $diferenca = $novaQuantidade - $antigaQuantidade;
          $item = Item::find($request['item_id']);
          if ($item->kit == 1) {
            $listaKitItem = KitItem::where('item_kit_id', $item->id)->get();
            foreach($listaKitItem as $kitItem) {
              $itemComposicao = Item::find($kitItem->item_composicao_id);
              $itemComposicao->quantidade -= $kitItem->quantidade * $diferenca;
              $itemComposicao->save();
            }
          } else {
            $item->quantidade -= $diferenca;
            $item->save();
          }
        } else {
          $item = Item::find($request['item_id']);
          if ($item->kit == 1) {
            $listaKitItem = KitItem::where('item_kit_id', $item->id)->get();
            foreach($listaKitItem as $kitItem) {
              $itemComposicao = Item::find($kitItem->item_composicao_id);
              $itemComposicao->quantidade -= $kitItem->quantidade * $novaQuantidade;
              $itemComposicao->save();
            }
          } else{
            $item->quantidade -= $novaQuantidade;
            $item->save();
          }
        }

        return redirect('/saidaConsumo.edit.' . $request->saida_consumo_id)->with('mensagem', 'Item adicionado com sucesso');
    }
}
