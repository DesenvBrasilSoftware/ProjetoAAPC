<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\ContasAReceber;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContasAReceberController extends Controller
{
    public function index($msg = '')
    {
        $lista = DB::select("
        SELECT 
            cr.id,
            cr.data,
            cr.valor_a_receber,
            cr.valor_recebido,
            p.nome AS pessoa
        FROM 
            conta_a_receber cr
        LEFT JOIN pessoa p
        ON cr.pessoa_id = p.id;
        ");

        return view('contasAReceber.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaPessoas = Pessoa::all();

        return view('contasAReceber.create')->with(['listaPessoas' => $listaPessoas]);
    }

    public function store(Request $request)
    {

        $obj = new ContasAReceber();

        if ($request['id']) {
            $obj = ContasAReceber::find($request['id']);
        }

        $obj->data = $request['data'];
        $obj->pessoa_id = $request['pessoa_id'];
        $obj->valor_a_receber = $request['valor_receber'];
        $obj->valor_recebido = $request['valor_recebido'];

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return redirect('/contasAReceber.create')->with('error', $msg);
        }

        if ($request['id']) {
            return redirect('/contasAReceber.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/contasAReceber.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = ContasAReceber::find($id);
        $listaPessoas = Pessoa::all();

        return view('contasAReceber.edit', compact('listaPessoas', 'msg', 'obj'));
    }

    public function delete($id)
    {
        $obj = ContasAReceber::find($id);
        $msg = "Conta a receber excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a conta.';
            return redirect('/contasAReceber.index')->with('error', $msg);
        }
        return redirect('/contasAReceber.index')->with('success', $msg);
    }

}
