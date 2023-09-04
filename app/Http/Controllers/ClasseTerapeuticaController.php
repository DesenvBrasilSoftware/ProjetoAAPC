<?php

namespace App\Http\Controllers;

use App\Models\ClassseTerapeutica;
use Illuminate\Http\Request;

class ClasseTerapeuicaController extends Controller
{
    public function index($msg = '')
    {
        $lista = Item::orderBy('nome')->get();
        return view('classeTerapeutica.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('classeTerapeutica.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new ClasseTerapeutica();
        if ($request['id']) {
            $obj = ClasseTerapeutica::find($request['id']);
        }
        $obj->descricao = $request['descricao'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/classeTerapeutica.edit.' . $obj->id);
        }
        return redirect('/classeTerapeutica.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = ClasseTerapeutica::find($id);
        return view('classeTerapeutica.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = ClasseTerapeutica::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a classe terapeutica. ';
        }
        return redirect('/classeTerapeutica.index')->with(['msg' => $msg]);
    }
}
