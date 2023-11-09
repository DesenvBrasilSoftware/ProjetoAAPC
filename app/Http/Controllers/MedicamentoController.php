<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\ClasseTerapeutica;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index($msg = '')
    {
        $lista = Medicamento::orderBy('nome')
        ->join('classe_terapeutica', 'medicamento.classe_terapeutica_id', '=', 'classe_terapeutica.id')
        ->select('medicamento.*', 'classe_terapeutica.descricao as classe_terapeutica')
        ->get();
        return view('medicamento.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaClasseTerapeutica = ClasseTerapeutica::all();

        return view('medicamento.create', compact('listaClasseTerapeutica', 'msg'));
    }

    public function store(Request $request)
    {
        $obj = new Medicamento();
        if ($request['id']) {
            $obj = Medicamento::find($request['id']);
        }
        $obj->nome = $request['nome'];
        $obj->principio_ativo = $request['principio_ativo'];
        $obj->classificacao = $request['classificacao'];
        $obj->classe_terapeutica_id = $request['classe_terapeutica_id'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/medicamento.edit.' . $obj->id);
        }
        return redirect('/medicamento.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Medicamento::find($id);
        $listaClasseTerapeutica = ClasseTerapeutica::all();

        return view('medicamento.edit', compact('listaClasseTerapeutica', 'msg', 'obj'));
    }

    public function delete($id)
    {
        $obj = Medicamento::find($id);
        $msg = "Medicamento ({$obj->nome}) excluído.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o medicamento. ';
        }
        return redirect('/medicamento.index')->with(['msg' => $msg]);
    }
}
