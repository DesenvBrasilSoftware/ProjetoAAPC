<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Bairro;
use App\Models\Acomodacao;
use App\Models\AcomodacaoPaciente;
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
                ap.id,
                ap.data_entrada,
                ap.data_saida,
                a.id as acomodacao_id,
                a.descricao as acomodacao
            FROM
                acomodacao_paciente ap
                INNER JOIN acomodacao a
                ON a.id = ap.acomodacao_id
            WHERE
                paciente_id = :paciente_id
        ", ['paciente_id' => $id]);


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

    public function deletarAcomodacao(Request $request)
    {
        $obj = AcomodacaoPaciente::find($request->delete_acomodacao_paciente_id);
        $msg = "Acomodação do paciente excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a acomodação do paciente. ';
            return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
        }
        return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
    }

    public function adicionarAcomodacao(Request $request)
    {
        $acomodacaoPaciente = new AcomodacaoPaciente();
        if ($request['acomodacao_paciente_id']) {
            $acomodacaoPaciente = AcomodacaoPaciente::find($request['acomodacao_paciente_id']);
        }

        $acomodacaoPaciente->paciente_id = $request['paciente_id'];
        $acomodacaoPaciente->data_entrada = $request['data_entrada_id'];
        $acomodacaoPaciente->data_saida = $request['data_saida_id'];
        $acomodacaoPaciente->acomodacao_id = $request['acomodacao_id'];

        $acomodacaoPaciente->save();

        return redirect('/paciente.edit.' . $request->paciente_id)->with('mensagem', 'Acomodação do paciente adicionada com sucesso');
    }
}
