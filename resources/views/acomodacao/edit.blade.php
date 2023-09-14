@extends('template')
@section('conteudo')
    <form id="form" action="/acomodacao.store" method="post">
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
            <div class="form-group">
                <label for="acomodacao_paciente_id">Acomodação paciente</label>
                <input type="text" name="acomodacao_paciente_id" class="form-control" id="acomodacao_paciente_id"
                    maxlength="45" value="{{ $obj->acomodacao_paciente_id }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="leitos">Leitos</label>
                <input type="text" name="leitos" class="form-control" id="leitos" maxlength="45"
                    value="{{ $obj->leitos }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="leitos_livres">Leitos livres</label>
                <input type="text" name="leitos_livres" class="form-control" id="leitos_livres" maxlength="45"
                    value="{{ $obj->leitos_livres }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="refrigerado">Refrigerado</label>
                <input type="checkbox" name="refrigerado" id="refrigerado" data-toggle="toggle" data-on="Sim"
                    data-off="Não" {{ $obj->refrigerado ? 'checked' : '' }}>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/acomodacao.index" class="btn btn-warning">Fechar</a>
        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("[data-toggle='toggle']").bootstrapToggle({
                size: "small",
            });
        });
    </script>
@endsection
