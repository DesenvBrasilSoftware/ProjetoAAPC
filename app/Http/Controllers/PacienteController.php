<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Acompanhante;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Contato;
use App\Models\Acomodacao;
use App\Models\Enfermidade;
use App\Models\Leito;
use App\Models\LeitoPaciente;
use App\Models\EnfermidadePaciente;
use App\Models\Consulta;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\Pessoa;

class PacienteController extends Controller
{
    public function index($msg = '')
    {
        $lista = Paciente::orderBy('nome')->get();
        return view('paciente.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        $listaCidade = Cidade::all();

        return view(
            'paciente.create',
            compact(
                'listaCidade',
                'msg',
            )
        );
    }

    public function store(Request $request)
    {
        $obj = new Paciente();
        if ($request['id']) {
            $obj = Paciente::find($request['id']);
        }

        $obj->nome = $request['nome'];
        $obj->data_nascimento = $request['data_nascimento'];
        $obj->data_obito = $request['data_obito'];
        $obj->data_biopsia = $request['data_biopsia'];
        $obj->data_alta = $request['data_alta'];
        $obj->radioterapia = ($request['radio'] === null) ? 0 : 1;
        $obj->quimioterapia = ($request['quimio'] === null) ? 0 : 1;
        $obj->moradia = ($request['moradia'] === '') ? null : $request['moradia'];
        $obj->medicamento = $request['medicamentos'];
        $obj->clinica = $request['clinica'];

        $cpf = preg_replace('/\D/', '', $request['cpf']);
        $obj->cpf = '' ? null : $cpf;

        $rg = preg_replace('/\D/', '', $request['rg']);
        $obj->rg = '' ? null : $rg;

        $obj->data_cadastro = $request['data_cadastro'];
        $obj->sexo = $request['sexo'];
        $obj->quantidade_filhos = $request['quantidade_filhos'];
        $obj->estado_civil = ($request['estado_civil'] === '') ? null : $request['estado_civil'];
        $obj->conjuge = $request['conjuge'];
        $obj->escolaridade = ($request['escolaridade'] === '') ? null : $request['escolaridade'];
        $obj->profissao = $request['profissao'];

        $renda_mensal = $request['renda_mensal'];
        $renda_mensal = trim($renda_mensal);
        $renda_mensal = preg_replace('/(?<=\d)\.(?=\d)/', '', $renda_mensal);
        $obj->renda_mensal = str_replace(',', '.', $renda_mensal);

        $obj->observacao = $request['observacao'];

        $cep = preg_replace('/\D/', '', $request['cep']);
        $obj->cep = '' ? null : $cep;

        $obj->endereco = $request['endereco'];
        $obj->complemento = $request['complemento'];
        $obj->ponto_referencia = $request['ponto_referencia'];
        $obj->bairro = $request['bairro'];
        $obj->cidade_id = $request['cidade_id'];

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if ($request['id']) {
                return redirect('/paciente.edit.' . $obj->id)->with('error', $msg)->withInput();
            }
            return redirect('/paciente.create')->with('error', $msg)->withInput();
        }

        if ($request['id']) {
            return redirect('/paciente.edit.' . $obj->id)->with('success', $msg);
        }

        return redirect('/paciente.edit.' . $obj->id)->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Paciente::find($id);
        $listaCidade = Cidade::all();
        $listaAcomodacao = Acomodacao::all();
        $listaLeito = DB::select("
        SELECT
            l.*,
            lp.paciente_id
        FROM
            leito l
        LEFT JOIN
            leito_paciente lp ON lp.leito_id = l.id;
        ");
        $listaEnfermidade = Enfermidade::all();
        $listaLeitoPaciente = DB::select("
        SELECT
          lp.id,
          lp.data_entrada,
          lp.data_saida,
          l.id AS leito_id,
          l.descricao AS leito,
          a.id AS acomodacao_id,
          a.descricao AS acomodacao
        FROM
          leito_paciente lp
          INNER JOIN leito l ON l.id = lp.leito_id
          INNER JOIN acomodacao a ON a.id = l.acomodacao_id
        WHERE
          lp.paciente_id = :paciente_id;
        ", ['paciente_id' => $id]);

        $listaEnfermidadePaciente = DB::select("
            SELECT
                ep.id,
                ep.data_cadastro,
                e.id as enfermidade_id,
                e.descricao as enfermidade
            FROM
                paciente_enfermidade ep
                INNER JOIN enfermidade e
                ON e.id = ep.enfermidade_id
            WHERE
                paciente_id = :paciente_id
        ", ['paciente_id' => $id]);

        $listaConsultaPaciente = DB::select("
            SELECT
                c.id,
                c.data as data_consulta,
                c.realizada,
                c.observacoes,
                pe.id as pessoa_id,
                pe.nome as profissional
            FROM
                consulta c
                INNER JOIN paciente pa
                ON pa.id = c.paciente_id
                INNER JOIN pessoa pe
                ON pe.id = c.pessoa_id
            WHERE
                paciente_id = :paciente_id
        ", ['paciente_id' => $id]);


        $listaPessoa = Pessoa::all(); // Isso trará todas as pessoas
        $listaProfissional = Pessoa::where('profissional', 1)->get(); // Isso trará apenas as pessoas onde o campo "profissional" é igual a 1


        $listaAcompanhante = Acompanhante::where('paciente_id', $id)
            ->join('pessoa', 'acompanhante.pessoa_id', '=', 'pessoa.id')
            ->select('acompanhante.*', 'pessoa.nome as nome_acompanhante')
            ->get();

        $listaContato = Contato::where('paciente_id', $id)
            ->join('pessoa', 'contato.pessoa_id', '=', 'pessoa.id')
            ->select('contato.*', 'pessoa.nome as nome_contato')
            ->get();

        return view(
            'paciente.edit',
            compact(
                'listaCidade',
                'listaLeitoPaciente',
                'listaEnfermidadePaciente',
                'listaConsultaPaciente',
                'listaAcomodacao',
                'listaLeito',
                'listaEnfermidade',
                'msg',
                'obj',
                'listaPessoa',
                'listaProfissional',
                'listaAcompanhante',
                'listaContato',
            )
        );
    }

    public function delete($id)
    {
        $obj = Paciente::find($id);

        $msg = "Paciente ({$obj->nome}) excluído.";

        try {
            $obj->delete();
        } catch(\Exception $e) {
            $msg = 'Não foi possível excluir o paciente. ';

            return redirect('/paciente.index')->with('error', $msg);
        }

        return redirect('/paciente.index')->with('success', $msg);
    }

    public function deletarAcomodacao(Request $request)
    {
        $obj = LeitoPaciente::find($request->delete_leito_paciente_id);
        $leito_id = $obj->leito_id;
        $data_saida = $obj->data_saida;
        $msg = "Acomodação do paciente excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a acomodação do paciente. ';
            return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
        }
        if($data_saida == null) {
          $leito = Leito::find($leito_id);
          $leito->ocupado = 0;
          $leito->save();
        }
        return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
    }

    public function adicionarAcomodacao(Request $request)
    {
        $leitoPaciente = new LeitoPaciente();
        $leito = Leito::find($request['leito_id']);
        if ($request['leito_paciente_id']) {
          $leitoPaciente = LeitoPaciente::find($request['leito_paciente_id']);
        }
        if($request['data_saida_id'] == null) {
          $leito->ocupado = '1';
        } else {
          $leito->ocupado = '0';
        }
        $leitoPaciente->paciente_id = $request['paciente_id'];
        $leitoPaciente->data_entrada = $request['data_entrada_id'];
        $leitoPaciente->data_saida = $request['data_saida_id'];
        $leitoPaciente->leito_id = $request['leito_id'];

        $leito->save();
        $leitoPaciente->save();

        return redirect('/paciente.edit.' . $request->paciente_id)->with('mensagem', 'Acomodação do paciente adicionada com sucesso');
    }

    public function deletarEnfermidade(Request $request)
    {
        $obj = EnfermidadePaciente::find($request->delete_enfermidade_paciente_id);
        $msg = "Enfermidade do paciente excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a enfermidade do paciente. ';
            return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
        }
        return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
    }

    public function adicionarEnfermidade(Request $request)
    {
        $enfermidadePaciente = new EnfermidadePaciente();
        if ($request['enfermidade_paciente_id']) {
            $enfermidadePaciente = EnfermidadePaciente::find($request['enfermidade_paciente_id']);
        }

        $enfermidadePaciente->paciente_id = $request['paciente_id'];
        $enfermidadePaciente->data_cadastro = $request['data_cadastro_id'];
        $enfermidadePaciente->enfermidade_id = $request['enfermidade_id'];

        $enfermidadePaciente->save();

        return redirect('/paciente.edit.' . $request->paciente_id)->with('mensagem', 'Enfermidade do paciente adicionada com sucesso');
    }

    public function deletarConsulta(Request $request)
    {
        dd($request);
        $obj = Consulta::find($request->delete_consulta_paciente_id);
        $msg = "Consulta do paciente excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a consulta do paciente. ';
            return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
        }


        return redirect('/paciente.edit.' . $request->delete_paciente_id)->with('mensagem', $msg);
    }

    public function adicionarConsulta(Request $request)
    {
        $consultaPaciente = new Consulta();
        if ($request['consulta_paciente_id']) {
            $consultaPaciente = Consulta::find($request['consulta_paciente_id']);
        }

        $consultaPaciente->paciente_id = $request['paciente_id'];
        $consultaPaciente->pessoa_id = $request['profissional_id'];
        $consultaPaciente->data = $request['data_consulta_id'];
        $consultaPaciente->realizada = isset($request['realizada']) ? 1 : 0;
        $consultaPaciente->observacoes = $request['observacoes'];

        $consultaPaciente->save();

        return redirect('/paciente.edit.' . $request->paciente_id)->with('mensagem', 'Consulta do paciente adicionada com sucesso');
    }
}
