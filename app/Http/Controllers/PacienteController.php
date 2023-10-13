<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{    
    public function index($msg='')
    {                  
        $lista = Paciente::orderBy('nome')->get();
        return view('paciente.index')->with(['lista' => $lista]);
    }
       
    public function create($msg = '')
    {
        return view('paciente.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Paciente();        
        if ($request['id']) {
            $obj = Paciente::find($request['id']);
        }
        $obj->nome = $request['nome'];
        $obj->data_nascimento = $request['data_nascimento'];
        $obj->cpf = $request['cpf'];
        $obj->rg = $request['rg'];
        $obj->data_cadastro = $request['data_cadastro'];
        $obj->sexo = $request['sexo'];
        $obj->quantidade_filhos = $request['quantidade_filhos'];
        $obj->estado_civil = $request['estado_civil'];
        $obj->conjuge = $request['conjuge'];
        $obj->escolaridade = $request['escolaridade'];
        $obj->profissao = $request['profissao'];
        $obj->renda_mensal = $request['renda_mensal'];
        $obj->observacao = $request['observacao'];
        $obj->cep = $request['cep'];
        $obj->logradouro = $request['logradouro'];
        $obj->numero = $request['numero'];
        $obj->complemento = $request['complemento'];
        $obj->ponto_referencia = $request['ponto_referencia'];
        $obj->bairro_id = $request['bairro_id'];
        $obj->consulta_id = $request['consulta_id'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }
        
        if ($request['id']){
            return redirect('/paciente.edit.'.$obj->id);
        }
        return redirect('/paciente.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Paciente::find($id);
        return view('paciente.edit')->with(['msg' => $msg,'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Paciente::find($id);
        $msg = "{$obj->nome} excluída.";
        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir o paciente. ';
        }
        return redirect('/paciente.index')->with(['msg' => $msg]);
    }
}
