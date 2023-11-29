<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index($msg='')
    {
        $lista = Usuario::orderBy('nome')->get();

        return view('usuario.index')->with(['lista' => $lista]);
    }

    public function create($msg = '')
    {

        return view('usuario.create');
    }

    public function store(Request $request, $id = null)
    {
        $id = $request['id'];

        $rules = [
            'login' => 'required|unique:usuario,login',
        ];

        if (!is_null($id)) {
            // caso seja alteracao, exclue a regra 'unique' para o próprio registro sendo atualizado
            $rules['login'] = [
                'required',
                Rule::unique('usuario')->ignore($id),
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Personalize o comportamento aqui, por exemplo, redirecionamento
            return back()->with('error', 'Login já utilizado');
        }

        $obj = $id ? Usuario::find($id) : new Usuario();

        $obj->nome = $request['nome'];
        $obj->login = $request['login'];
        $obj->senha = md5($request['senha']);
        $obj->visualiza_acomodacao = isset($request['visualiza_acomodacao']) ? 1 : 0;
        $obj->visualiza_localidade = isset($request['visualiza_localidade']) ? 1 : 0;
        $obj->visualiza_pessoa = isset($request['visualiza_pessoa']) ? 1 : 0;
        $obj->visualiza_paciente = isset($request['visualiza_paciente']) ? 1 : 0;
        $obj->visualiza_refeicao = isset($request['visualiza_refeicao']) ? 1 : 0;
        $obj->visualiza_doacoes = isset($request['visualiza_doacoes']) ? 1 : 0;
        $obj->visualiza_financeiro = isset($request['visualiza_financeiro']) ? 1 : 0;
        $obj->visualiza_classe_terapeutica = isset($request['visualiza_classe_terapeutica']) ? 1 : 0;
        $obj->visualiza_enfermidade = isset($request['visualiza_enfermidade']) ? 1 : 0;
        $obj->visualiza_estoque = isset($request['visualiza_estoque']) ? 1 : 0;
        $obj->visualiza_medicamentos = isset($request['visualiza_medicamentos']) ? 1 : 0;
        $obj->visualiza_usuarios = isset($request['visualiza_usuarios']) ? 1 : 0;
        $obj->visualiza_relatorios = isset($request['visualiza_relatorios']) ? 1 : 0;

        $msg = 'Registro salvo no banco de dados';

        try {
            $obj->save();
        }catch(\Exception $e) {
          $msg = $e->getMessage();
          if ($request['id']) {
              return redirect('/usuario.edit.' . $obj->id)->with('error', $msg)->withInput();
          }
          return redirect('/usuario.create')->with('error', $msg)->withInput();
        }

        if ($request['id']) {
          return redirect('/usuario.edit.' . $obj->id)->with('success', $msg);
      }
      return redirect('usuario.index')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Usuario::find($id);

        return view('usuario.edit')->with(['msg' => $msg,'obj' => $obj]);
    }

    public function delete($id)
    {
        try {
            $obj = Usuario::find($id);

            $tipoMsg = 'success';
            $msg = "Usuário [{$obj->nome}] excluído.";

            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir o usuário.';
            $tipoMsg = 'error';
        }

        return redirect('/usuario.index')->with([$tipoMsg => $msg]);
    }

    public function verificaLogin(Request $request)
    {
        $login = $request->input('login');
        $id = $request->input('id');

        $query = Usuario::where('login', $login);

        if (!empty($id)) {
            // Exclue o registro com o mesmo ID da verificação
            $query->where('id', '!=', $id);
        }

        $user = $query->first();

        if ($user) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

}
