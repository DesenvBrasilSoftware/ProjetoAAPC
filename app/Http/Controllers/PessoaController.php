<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index($msg = '')
    {
        $lista = Pessoa::orderBy('nome')->get();
        return view('pessoa.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('pessoa.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Pessoa();
        if ($request['id']) {
            $obj = Pessoa::find($request['id']);
        }
        $obj->nome = $request['nome'];
        $obj->colaborador = $request['colaborador'];
        $obj->profissional = $request['profissional'];
        $obj->voluntario = $request['voluntario'];
        $obj->fornecedor = $request['fornecedor'];
        $obj->clinica = $request['clinica'];
        $obj->cpf = $request['cpf'];
        $obj->cnpj = $request['cnpj'];
        $obj->rg = $request['rg'];
        $obj->data_cadastro = $request['data_Cadastro'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }

        if ($request['id']) {
            return redirect('/pessoa.edit.' . $obj->id);
        }
        return redirect('pessoa.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Pessoa::find($id);
        return view('pessoa.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Pessoa::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a pessoa. ';
        }
        return redirect('/pessoa.index')->with(['msg' => $msg]);
    }
}
