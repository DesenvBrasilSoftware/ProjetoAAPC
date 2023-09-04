@extends('template')
@section('conteudo')
    <form id="form" action="/grupoItem.store" method="post">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" maxlength="120"
                    value="{{ old('descricao') }}" autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="perecivel">Perecível</label>
                <input type="checkbox" name="perecivel" id="perecivel" data-toggle="toggle" data-on="Sim" data-off="Não"
                    {{ old('perecivel') ? 'checked' : '' }}>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="refrigerado">Refrigerado</label>
                <input type="checkbox" name="refrigerado" id="refrigerado" data-toggle="toggle" data-on="Sim"
                    data-off="Não" {{ old('refrigerado') ? 'checked' : '' }}>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/grupoItem.index" class="btn btn-warning">Fechar</a>
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
