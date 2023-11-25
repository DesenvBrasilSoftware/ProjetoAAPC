@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/acomodacao.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="45"
      value="{{ $obj->descricao }}" autofocus placeholder="Informe a descrição">
  </div>
  <div class="form-group">
    <label for="leitos">Leitos:</label>
    <input required type="number" name="leitos" class="numero form-control" id="leitos"
      value="{{ $obj->leitos }}" placeholder="Informe o número de leitos">
  </div>
  <div class="form-group">
    <label for="leitos_livres">Leitos livres:</label>
    <input required type="number" name="leitos_livres" class="numero form-control" id="leitos_livres"
      value="{{ $obj->leitos_livres }}" placeholder="Informe o número de leitos livres">
  </div>
  <div class="form-group">
    <label for="refrigerado">Refrigerado:</label>
    <input type="checkbox" name="refrigerado" id="refrigerado" data-toggle="toggle" data-on="Sim"
    data-off="Não" {{ $obj->refrigerado ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <a type="button" href="/acomodacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(function() {
      $("[data-toggle='toggle']").bootstrapToggle({
          size: "small",
      });
  });
  $(".numero").mask("000000000");
</script>
@endsection
