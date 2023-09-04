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
                <label for="perecivel">Perecível</label>
                <input type="checkbox" name="perecivel" id="perecivel" data-toggle="toggle" data-on="Sim" data-off="Não"
                    {{ $obj->perecivel ? 'checked' : '' }}>
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
            <a type="button" href="/enfermidade.index" class="btn btn-warning">Fechar</a>
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
