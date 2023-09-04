@extends('template')
@section('conteudo')
    <form id="form" action="/classeTerapeutica.store" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
        <div class="row">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" maxlength="120"
                    value="{{ $obj->descricao }}" autofocus>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/classeTerapeutica.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
@endsection
