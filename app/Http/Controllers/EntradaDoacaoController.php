<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaDoacao;
use App\Models\EntradaDoacaoItem;
use App\Models\Pessoa;
use App\Models\Item;
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

        return redirect('/entradaDoacao.create');
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
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir a doação.';
        }
        return redirect('/entradaDoacao.index')->with(['msg' => $msg]);
    }

    public function deletarItem(Request $request)
    {
        $obj = EntradaDoacaoItem::find($request->delete_entrada_doacao_item_id);
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

        $entradaDoacaoItem->entrada_doacao_id = $request['entrada_doacao_id'];
        $entradaDoacaoItem->item_id = $request['item_id'];
        $entradaDoacaoItem->quantidade = $request['quantidade'];

        $entradaDoacaoItem->save();

        return redirect('/entradaDoacao.edit.' . $request->entrada_doacao_id)->with('mensagem', 'Item adicionado com sucesso');
    }
}
