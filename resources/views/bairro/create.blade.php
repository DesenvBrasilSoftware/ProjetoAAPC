@extends('template')
@section('conteudo')
    <form id="form" action="/classeTerapeutica.store" method="post">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ old('nome') }}" autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="nome">Cidade</label>
                <select name="cidade_id" class="form-control" id="cidade_id">
                    <option value="" label="Selecione uma cidade"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/bairro.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
@endsection
