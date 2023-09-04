@extends('template')
@section('conteudo')
    <form id="form" action="/item.store" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
        <div class="row">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" maxlength="120"
                    value={{ $obj->descricao }} autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="grupo_item_id">Grupo do item</label>
                <select name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
                    <option value="" label="Selecione um grupo de item"></option>
                    <option value={{ $obj->grupo_item_id }} label={{ $obj->grupo_item_id }} selected></option>
                    @if (isset($listaGrupoItem))
                        @foreach ($listaGrupoItem as $grupoItem)
                            <option value={{ $grupoItem->id }} label={{ $grupoItem->descrciao }}></label>></option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="form-group">
                    <label for="fabricacao">Data de fabricação:</label>
                    <input type="date" class="form-control" id="fabricacao" name="fabricacao"
                        value={{ $obj->fabricacao }}>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="validade">Data de Validade:</label>
                    <input type="date" class="form-control" id="validade" name="validade" value={{ $obj->validade }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="kit">Kit</label>
                <input type="text" name="kit" class="form-control" id="kit" maxlength="120"
                    value={{ $obj->kit }} autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="medicacao_id">Medicamento</label>
                <input type="text" name="medicacao_id" class="form-control" id="medicacao_id" maxlength="120"
                    value={{ $obj->medicamento_id }} autofocus>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/enfermidade.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
@endsection
