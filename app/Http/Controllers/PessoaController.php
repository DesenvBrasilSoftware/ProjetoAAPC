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
        $obj->colaborador = ($request['colaborador'] === null) ? 0 : 1;
        $obj->profissional = ($request['profissional'] === null) ? 0 : 1;
        $obj->voluntario = ($request['voluntario'] === null) ? 0 : 1;
        $obj->fornecedor = ($request['fornecedor'] === null) ? 0 : 1;
        $obj->clinica = ($request['clinica'] === null) ? 0 : 1;
        if ($request['cpfCnpj'] == 'off') {
          $cnpj = preg_replace('/\D/', '', $request['cnpj']);
          $obj->cnpj = '' ? null : $cnpj;
        } else {
          $cpf = preg_replace('/\D/', '', $request['cpf']);
          $obj->cpf = '' ? null : $cpf;
        }
        $obj->rg = preg_replace('/\D/', '', $request['rg']);
        $obj->data_cadastro = $request['data_cadastro'];

        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if ($request['id']) {
                return redirect('/pessoa.edit.' . $obj->id)->with('error', $msg)->withInput();
            }
            return redirect('/pessoa.create')->with('error', $msg)->withInput();
        }

        if ($request['id']) {
            return redirect('/pessoa.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('pessoa.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Pessoa::find($id);
        return view('pessoa.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Pessoa::find($id);
        $msg = "Pessoa ({$obj->nome}) excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a pessoa. ';
            return redirect('/pessoa.index')->with('error', $msg);
        }
        return redirect('/pessoa.index')->with(['msg' => $msg]);
    }
}
