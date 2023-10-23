<?php

namespace App\Http\Controllers;

use App\Models\Refeicao;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RefeicaoController extends Controller
{
    public function index($msg = '')
    {
        $lista = DB::select("
            SELECT
                r.id,
                r.data,
                CASE r.tipo
                    WHEN 1 THEN 'Café da manhã'
                    WHEN 2 THEN 'Lanche da manhã'
                    WHEN 3 THEN 'Almoço'
                    WHEN 4 THEN 'Lanche da tarde'
                    WHEN 5 THEN 'Jantar'
                    WHEN 6 THEN 'Lanche da noite'
                    WHEN 7 THEN 'Ceia'
                    ELSE 'Tipo desconhecido'
                END AS tipo,
                pe.nome as acompanhante,
                pa.nome as paciente,
                r.servida
            FROM
                refeicao r
            INNER JOIN acompanhante a ON r.acompanhante_id = a.id
            INNER JOIN pessoa pe ON a.pessoa_id = pe.id
            INNER JOIN paciente pa ON r.paciente_id = pa.id
            ORDER BY
                r.data;
        ");

        return view('refeicao.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {
        return view('refeicao.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Refeicao();
        if ($request['id']) {
            $obj = Refeicao::find($request['id']);
        }
        $obj->descricao = $request['descricao'];
        $obj->leitos = $request['leitos'];
        $obj->leitos_livres = $request['leitos_livres'];
        $obj->refrigerado = isset($request['refrigerado']) ? 1 : 0;

        $msg = 'Registro salvo com sucesso.';

        try {
            $obj->save();
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return redirect('/refeicao.create')->with('error', $msg);
        }

        if ($request['id']) {
            return redirect('/refeicao.edit.' . $obj->id)->with('success', $msg);
        }
        return redirect('/refeicao.create')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Refeicao::find($id);
        return view('refeicao.edit')->with(['msg' => $msg, 'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Refeicao::find($id);
        $msg = "Refeição ({$obj->descricao}) excluída.";
        try {
            $obj->delete();
        } catch (\Exception $e) {
            $msg = 'Não foi possível excluir a refeição. ';
            return redirect('/refeicao.index')->with('error', $msg);
        }
        return redirect('/refeicao.index')->with('success', $msg);
    }
}
