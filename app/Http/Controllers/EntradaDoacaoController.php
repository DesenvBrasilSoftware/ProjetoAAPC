<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaDoacao;
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
        $listaItem = Item::all();

        return view('entradaDoacao.create', compact('listaPessoa', 'listaItem', 'msg',));
    }

    public function store(Request $request)
    {
        $obj = new Enfermidade();        
        if ($request['id']) {
            $obj = Enfermidade::find($request['id']);
        }
        $obj->descricao = $request['descricao'];
        $obj->cid = $request['cid'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }
        
        if ($request['id']){
            return redirect('/enfermidade.edit.'.$obj->id);
        }
        return redirect('/enfermidade.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Enfermidade::find($id);
        return view('enfermidade.edit')->with(['msg' => $msg,'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Enfermidade::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir a enfermidade. ';
        }
        return redirect('/enfermidade.index')->with(['msg' => $msg]);
    }
}
