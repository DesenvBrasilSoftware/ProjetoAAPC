<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermidade;

class EnfermidadeController extends Controller
{    
    public function index($msg='')
    {                  
        $lista = Enfermidade::orderBy('descricao')->get();
        return view('enfermidade.index')->with(['lista' => $lista]);
    }
       
    public function create($msg = '')
    {
        return view('enfermidade.create')->with(['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $obj = new Enfermidade();        
        if ($request['id']) {
            $obj = Enfermidade::find($request['id']);
        }
        $obj->descricao = $request['descricao'];
        $obj->cid = $request['cid'];
        $msg = 'Registro salvo no banco de dados';
        try {
            $obj->save();
        }catch(\Exception $e) {
            $msg = 'Não foi possível salvar o registro no banco de dados';
            session()->flashInput($request->input());
        }
        
        if ($request['id']){
            return redirect('/enfermidade.edit.'.$obj->id);
        }
        return redirect('/enfermidade.create');
    }

    public function edit(string $id, $msg = '')
    {
        $obj = Enfermidade::find($id);
        return view('enfermidade.edit')->with(['msg' => $msg,'obj' => $obj]);
    }

    public function delete($id)
    {
        $obj = Enfermidade::find($id);
        $msg = "{$obj->descricao} excluída.";
        try {
            $obj->delete();
        }catch(\Exception $e) {
            $msg = 'Não foi possível excluir a enfermidade. ';
        }
        return redirect('/enfermidade.index')->with(['msg' => $msg]);
    }
}
