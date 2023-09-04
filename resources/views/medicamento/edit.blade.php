@extends('template')
@section('conteudo')
    <form id="form" action="/medicamento.store" method="post">
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
                <label for="principio_ativo">Princípio ativo</label>
                <input type="text" name="principio_ativo" class="form-control" id="principio_ativo" maxlength="45"
                    value="{{ $obj->principio_ativo }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="classificacao">Classificação</label>
                <select name="classificacao" class="form-control" id="classificacao">
                    <option value="" label="Selecione uma classificação"></option>
                    <option value="R" label="Referência"></option>
                    <option value="S" label="Similar"></option>
                    <option value="G" label="Genérico"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="classe_terapeutica_id">Classe terapêutica</label>
                <input type="text" name="classe_terapeutica_id" class="form-control" id="classe_terapeutica_id" maxlength="45"
                    value="{{ $obj->classe_terapeutica_id }}">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/medicamento.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
@endsection
