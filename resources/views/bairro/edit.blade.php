@extends('template')
@section('conteudo')
    <form id="form" action="/classeTerapeutica.store" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
        <div class="row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ $obj->nome }}" autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="cidade_id">Cidade</label>
                <select name="cidade_id" class="form-control" id="cidade_id">
                    <option value={{ $obj->cidade_id }} label={{ $obj->cidade_id }}></option>
                </select>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/classeTerapeutica.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
@endsection