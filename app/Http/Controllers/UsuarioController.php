<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

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

    public function store(Request $request)
    {
        $id = $request['id'];
        $obj = $id ? Usuario::find($id) : new Usuario();

        $obj->nome = $request['nome'];
        $obj->login = $request['login'];
        $obj->senha = $request['senha'];

        $msg = 'Registro salvo no banco de dados';

        try {
            $obj->save();

        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o usuário no banco de dados.';
            return back()->with('error', $msg);
        }

        return redirect('/usuario.index')->with('success', $msg);
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Usuario::find($id);

        return view('usuario.edit')->with(['msg' => $msg,'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Usuario::find($id);

        $msg = "Usuário [{$obj->nome}] excluído.";

        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir o usuário.';
        }

        return redirect('/usuario.index')->with(['msg' => $msg]);
    }
}
