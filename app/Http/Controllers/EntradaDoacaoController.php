<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaDoacao;
use App\Models\EntradaDoacaoItem;
use App\Models\Pessoa;
use App\Models\Item;
use App\Models\KitItem;
use Illuminate\Support\Facades\DB;

class EntradaDoacaoController extends Controller
{
    public function index($msg='')
    {
        $lista = DB::select("
        SELECT
            ed.id,
            ed.data,
            p.nome as doador
        FROM
            entrada_doacao ed
            INNER JOIN pessoa p
            ON p.id = ed.pessoa_id
        ");

        return view('entradaDoacao.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaPessoa = Pessoa::all();

        return view('entradaDoacao.create', compact('listaPessoa', 'msg',));
    }

    public function store(Request $request)
    {
        $obj = new EntradaDoacao();
        if ($request['id']) {
            $obj = EntradaDoacao::find($request['id']);
        }
        $obj->pessoa_id = $request['pessoa_id'];
        $obj->data = $request['data'];
        $msg = 'Registro salvo no banco de dados';


        try {
            $obj->save();
        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']){
            return redirect('/entradaDoacao.edit.'.$obj->id);
        }

        return redirect('/entradaDoacao.edit.'.$obj->id);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = EntradaDoacao::find($id);
        $listaPessoa = Pessoa::all();
        $listaItem = Item::all();
        $listaEntradaDoacaoItem = DB::select("
            SELECT
                edi.id,
                edi.quantidade,
                i.id as item_id,
                i.descricao as item
            FROM
                entrada_doacao_item edi
                INNER JOIN item i
                ON i.id = edi.item_id
            WHERE
                entrada_doacao_id = :entrada_doacao_id
        ", ['entrada_doacao_id' => $id]);

        return view('entradaDoacao.edit', compact('listaItem', 'listaEntradaDoacaoItem', 'listaPessoa','obj', 'msg',));
    }

    public function delete($id)
    {
        $obj = EntradaDoacao::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\PDOException $e) {
            // Verifica se a exceção é devido a uma violação de chave estrangeira
            if (strpos($e->getMessage(), 'Integrity constraint violation') !== false) {
                $msg = 'Não é possível excluir a doação, pois existem itens cadastrados nessa entrada de doação. Remova os itens antes de excluí-la.';
            } else {
                $msg = 'Não foi possível excluir a doação.';
            }
            return redirect('/entradaDoacao.index')->with(['error' => $msg]);
        }
        return redirect('/entradaDoacao.index')->with(['success' => $msg]);
    }

    public function deletarItem(Request $request)
    {
        $obj = EntradaDoacaoItem::find($request->delete_entrada_doacao_item_id);

        $item = Item::find($obj->item_id);
        $item->quantidade -= $obj->quantidade;
        $item->save();

        $msg = "Item da doação excluído excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluiro item da doação. ';
            return redirect('/entradaDoacao.edit.' . $request->delete_entrada_doacao_id)->with('mensagem', $msg);
        }
        return redirect('/entradaDoacao.edit.' . $request->delete_entrada_doacao_id)->with('mensagem', $msg);
    }

    public function adicionarItem(Request $request)
    {
        $entradaDoacaoItem = new EntradaDoacaoItem();
        if ($request['entrada_doacao_item_id']) {
            $entradaDoacaoItem = EntradaDoacaoItem::find($request['entrada_doacao_item_id']);
        }
        $novaQuantidade = $request['quantidade'];
        $antigaQuantidade = $entradaDoacaoItem->quantidade;

        $entradaDoacaoItem->entrada_doacao_id = $request['entrada_doacao_id'];
        $entradaDoacaoItem->item_id = $request['item_id'];
        $entradaDoacaoItem->quantidade = $novaQuantidade;

        $entradaDoacaoItem->save();

        if ($request['entrada_doacao_item_id']) {
          // Edição da quantidade
          $diferenca = $novaQuantidade - $antigaQuantidade;
          $item = Item::find($request['item_id']);
          if ($item->kit == 1) {
            $listaKitItem = KitItem::where('item_kit_id', $item->id)->get();
            foreach($listaKitItem as $kitItem) {
              $itemComposicao = Item::find($kitItem->item_composicao_id);
              $itemComposicao->quantidade += $kitItem->quantidade * $diferenca;
              $itemComposicao->save();
            }
          } else {
            $item->quantidade += $diferenca;
          }
        } else {
          $item = Item::find($request['item_id']);
          if ($item->kit == 1) {
            $listaKitItem = KitItem::where('item_kit_id', $item->id)->get();
            foreach($listaKitItem as $kitItem) {
              $itemComposicao = Item::find($kitItem->item_composicao_id);
              $itemComposicao->quantidade += $kitItem->quantidade * $novaQuantidade;
              $itemComposicao->save();
            }
          } else {
            $item->quantidade += $request['quantidade'];
          }
        }
        $item->save();

        return redirect('/entradaDoacao.edit.' . $request->entrada_doacao_id)->with('mensagem', 'Item adicionado com sucesso');
    }
}
