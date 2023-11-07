<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\ContasAPagar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContasAPagarController extends Controller
{
    public function index($msg = '')
    {
        $lista = DB::select("
        SELECT 
            cp.id,
            cp.data,
            cp.valor_a_pagar,
            cp.valor_pago,
            p.nome AS pessoa
        FROM 
            conta_a_pagar cp
        LEFT JOIN pessoa p
        ON cp.pessoa_id = p.id;
        ");

        return view('contasAPagar.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaPessoas = Pessoa::all();

        return view('contasAPagar.create')->with(['listaPessoas' => $listaPessoas]);
    }

    public function store(Request $request)
    {

        $obj = new ContasAPagar();

        if ($request['id']) {
            $obj = ContasAPagar::find($request['id']);
        }

        $obj->data = $request['data'];
        $obj->pessoa_id = $request['pessoa_id'];
        $obj->valor_a_pagar = $request['valor_pagar'];
        $obj->valor_pago = $request['valor_pago'];

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return redirect('/contasAPagar.create')->with('error', $msg);
        }

        if ($request['id']) {
            return redirect('/contasAPagar.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/contasAPagar.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = ContasAPagar::find($id);
        $listaPessoas = Pessoa::all();

        return view('contasAPagar.edit', compact('listaPessoas', 'msg', 'obj'));
    }

    public function delete($id)
    {
        $obj = ContasAPagar::find($id);
        $msg = "Conta a pagar excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a conta.';
            return redirect('/contasAPagar.index')->with('error', $msg);
        }
        return redirect('/contasAPagar.index')->with('success', $msg);
    }

}
