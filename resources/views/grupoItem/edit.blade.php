@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/grupoItem.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="45"
      value="{{ $obj->descricao }}" autofocus placeholder="Digite a descrição do grupo do item">
  </div>
  <!-- <div class="form-group">
    <label for="perecivel">Perecível</label>
    <input type="checkbox" name="perecivel" id="perecivel" data-toggle="toggle" data-on="Sim" data-off="Não"
    {{ $obj->perecivel ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="refrigerado">Refrigerado</label>
    <input type="checkbox" name="refrigerado" id="refrigerado" data-toggle="toggle" data-on="Sim"
    data-off="Não" {{ $obj->refrigerado ? 'checked' : '' }}>
  </div> -->
  <div class="form-group">
    <a type="button" href="/grupoItem.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
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
