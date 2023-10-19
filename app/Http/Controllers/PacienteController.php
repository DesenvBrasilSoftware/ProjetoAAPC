<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Bairro;
use App\Models\Acomodacao;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index($msg = '')
    {
        $lista = Paciente::orderBy('nome')->get();
        return view('paciente.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaBairro = Bairro::all();

        return view('paciente.create', compact('listaBairro', 'msg'));
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

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return redirect('/paciente.create')->with('error', $msg);
        }

        if ($request['id']) {
            return redirect('/paciente.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/paciente.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Paciente::find($id);
        $listaBairro = Bairro::all();
        $listaAcomodacao = Acomodacao::all();
        $listaAcomodacaoPaciente = DB::select("
        SELECT
            *
        FROM
            acomodacao_paciente
        ");

        return view('paciente.edit', compact('listaBairro', 'listaAcomodacaoPaciente', 'listaAcomodacao', 'msg', 'obj'));
    }

    public function delete($id)
    {
        $obj = Paciente::find($id);
        $msg = "Paciente ({$obj->nome}) excluído.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir o paciente. ';
            return redirect('/paciente.index')->with('error', $msg);
        }
        return redirect('/paciente.index')->with('success', $msg);
    }

    public function adicionarAcomodacaoPaciente(Request $request)
    {
        // Processar os dados da solicitação e realizar a lógica necessária

        // Por exemplo, você pode salvar os dados no banco de dados:
        // $novoRegistro = Modelo::create($request->all());

        // Em seguida, você pode retornar uma resposta JSON para o cliente:
        return redirect('/paciente.edit.' . $request->paciente_id)->with('mensagem', 'Acomodação do paciente adicionada com sucesso');
    }
}
