@extends('template')
@section('conteudo')
    <form class="needs-validation" novalidate id="form" action="/classeTerapeutica.store" method="post">
        @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ old('nome') }}" autofocus>
            </div>
            <div class="form-group">
                <label for="nome">Cidade</label>
                <select name="cidade_id" class="form-control" id="cidade_id">
                    <option value="" label="Selecione uma cidade"></option>
                </select>
            </div>
        <div class="form-group">
            <a type="button" href="/bairro.index" class="btn btn-warning">Fechar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
@endsection
