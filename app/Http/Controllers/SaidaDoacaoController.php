<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaidaDoacao;
use App\Models\SaidaDoacaoItem;
use App\Models\Pessoa;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class SaidaDoacaoController extends Controller
{
    public function index($msg='')
    {
        $lista = DB::select("
        SELECT
            sd.id,
            sd.data,
            p.nome as doador
        FROM
            saida_doacao sd
            INNER JOIN pessoa p
            ON p.id = sd.pessoa_id
        ");

        return view('saidaDoacao.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaPessoa = Pessoa::all();

        return view('saidaDoacao.create', compact('listaPessoa', 'msg',));
    }

    public function store(Request $request)
    {
        $obj = new SaidaDoacao();
        if ($request['id']) {
            $obj = SaidaDoacao::find($request['id']);
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
            return redirect('/saidaDoacao.edit.'.$obj->id);
        }

        return redirect('/saidaDoacao.edit.'.$obj->id);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = SaidaDoacao::find($id);
        $listaPessoa = Pessoa::all();
        $listaItem = Item::all();
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

        return view('saidaDoacao.edit', compact('listaItem', 'listaSaidaDoacaoItem', 'listaPessoa','obj', 'msg',));
    }

    public function delete($id)
    {
        $obj = SaidaDoacao::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir a doação.';
        }
        return redirect('/saidaDoacao.index')->with(['msg' => $msg]);
    }

    public function deletarItem(Request $request)
    {
        $obj = SaidaDoacaoItem::find($request->delete_saida_doacao_item_id);
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

        $saidaDoacaoItem->saida_doacao_id = $request['saida_doacao_id'];
        $saidaDoacaoItem->item_id = $request['item_id'];
        $saidaDoacaoItem->quantidade = $request['quantidade'];

        $saidaDoacaoItem->save();

        return redirect('/saidaDoacao.edit.' . $request->saida_doacao_id)->with('mensagem', 'Item adicionado com sucesso');
    }
}
