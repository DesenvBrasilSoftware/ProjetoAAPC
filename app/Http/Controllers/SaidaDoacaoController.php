<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\KitItem;
use App\Models\Paciente;
use App\Models\Pessoa;
use App\Models\SaidaDoacao;
use App\Models\SaidaDoacaoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaidaDoacaoController extends Controller
{
    public function index($msg = '')
    {
        $lista = DB::select("
          SELECT
              sd.id,
              sd.data,
              p.nome as doador,
              COALESCE(pessoa_donatario.nome, paciente_donatario.nome) as donatario
          FROM
              saida_doacao sd
              INNER JOIN pessoa p ON p.id = sd.pessoa_doador_id
              LEFT JOIN pessoa pessoa_donatario ON pessoa_donatario.id = sd.pessoa_donatario_id
              LEFT JOIN paciente paciente_donatario ON paciente_donatario.id = sd.paciente_donatario_id;
        ");

        return view('saidaDoacao.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaPessoa = Pessoa::all()->sortBy('nome');
        $listaPaciente = Paciente::all()->sortBy('nome');

        return view('saidaDoacao.create')->with(['listaPessoa' => $listaPessoa, 'listaPaciente' => $listaPaciente]);
    }

    public function store(Request $request)
    {
        $obj = new SaidaDoacao();

        if ($request['id']) {
            $obj = SaidaDoacao::find($request['id']);
        }

        $obj->pessoa_doador_id = $request['pessoa_doador_id'];
        $obj->pessoa_donatario_id = $request['radio'] ? null : $request['pessoa_donatario_id'];
        $obj->paciente_donatario_id = $request['radio'] ? $request['paciente_donatario_id'] : null;

        $obj->data = $request['data'];

        $msg = 'Registro salvo no banco de dados';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/saidaDoacao.edit.' . $obj->id);
        }

        return redirect('/saidaDoacao.edit.' . $obj->id);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = SaidaDoacao::find($id);

        $listaPessoa = Pessoa::all();

        $listaPaciente = Paciente::all();

        $listaItem = Item::all();

        $saidaDoacao = DB::select("
          SELECT
              *
          FROM
              saida_doacao sd
          WHERE
              sd.id = :id
        ", ['id' => $id]);

        $listaSaidaDoacaoItem = DB::select("
            SELECT
                sdi.id,
                sdi.quantidade,
                i.id as item_id,
                i.descricao as item
            FROM
                saida_doacao_item sdi
                INNER JOIN item i
                ON i.id = sdi.item_id
            WHERE
                saida_doacao_id = :saida_doacao_id
        ", ['saida_doacao_id' => $id]);

        return view('saidaDoacao.edit', compact('listaItem', 'listaSaidaDoacaoItem', 'listaPessoa', 'listaPaciente', 'saidaDoacao', 'obj', 'msg', ));
    }

    public function delete($id)
    {
        $obj = SaidaDoacao::find($id);

        $msg = "Doação excluída.";

        try {
            $obj->delete();
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'Integrity constraint violation') !== false) {
                $msg = 'Não é possível excluir a doação, pois existem itens cadastrados nessa saída de doação. Remova os itens antes de excluí-la.';
            } else {
                $msg = 'Não foi possível excluir a doação.';
            }

            return redirect('/saidaDoacao.index')->with(['error' => $msg]);
        }

        return redirect('/saidaDoacao.index')->with(['success' => $msg]);
    }

    public function deletarItem(Request $request)
    {
        $obj = SaidaDoacaoItem::find($request->delete_saida_doacao_item_id);

        $item = Item::find($obj->item_id);
        $item->quantidade += $obj->quantidade;
        $item->save();

        $msg = "Item da doação excluído excluída.";

        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o item da doação. ';

            return redirect('/saidaDoacao.edit.' . $request->delete_saida_doacao_id)->with('mensagem', $msg);
        }

        return redirect('/saidaDoacao.edit.' . $request->delete_saida_doacao_id)->with('mensagem', $msg);
    }

    public function adicionarItem(Request $request)
    {
        $saidaDoacaoItem = new SaidaDoacaoItem();

        if ($request['saida_doacao_item_id']) {
            $saidaDoacaoItem = SaidaDoacaoItem::find($request['saida_doacao_item_id']);
        }

        $novaQuantidade = $request['quantidade'];
        $antigaQuantidade = $saidaDoacaoItem->quantidade;

        $saidaDoacaoItem->saida_doacao_id = $request['saida_doacao_id'];
        $saidaDoacaoItem->item_id = $request['item_id'];
        $saidaDoacaoItem->quantidade = $novaQuantidade;

        $saidaDoacaoItem->save();

        if ($request['saida_doacao_item_id']) {
            $diferenca = $novaQuantidade - $antigaQuantidade;

            $item = Item::find($request['item_id']);

            if ($item->kit == 1) {
                $listaKitItem = KitItem::where('item_kit_id', $item->id)->get();

                foreach ($listaKitItem as $kitItem) {
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
                foreach ($listaKitItem as $kitItem) {
                    $itemComposicao = Item::find($kitItem->item_composicao_id);
                    $itemComposicao->quantidade -= $kitItem->quantidade * $novaQuantidade;
                    $itemComposicao->save();
                }
            } else {
                $item->quantidade -= $novaQuantidade;
                $item->save();
            }
        }

        return redirect('/saidaDoacao.edit.' . $request->saida_doacao_id)->with('mensagem', 'Item adicionado com sucesso');
    }
}
