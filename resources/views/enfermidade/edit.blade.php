@extends('template')
@section('conteudo')
<form id="form" action="/enfermidade.store" method="post">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$obj->id}}">
    <div class="row">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" 
                    name="descricao" 
                    class="form-control" 
                    id="descricao" 
                    maxlength="120" 
                    value="{{$obj->descricao}}"
                    autofocus
                    >
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="cid">CID</label>
            <input type="text" 
                    name="cid" 
                    class="form-control" 
                    id="cid" 
                    maxlength="45" 
                    value="{{$obj->cid}}"
                    >
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a type="button" href="/enfermidade.index" class="btn btn-warning">Fechar</a>
    </div>
        
</form>
        
@endsection
