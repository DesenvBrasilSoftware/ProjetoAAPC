@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/acomodacao.store" method="post">
  @csrf
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="45"
    value="{{ old('descricao') }}" autofocus placeholder="Informe a descrição" />
  </div>
  <div class="form-group">
    <label for="refrigerado">Refrigerado:</label>
    <input type="checkbox" name="refrigerado" id="refrigerado"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('refrigerado') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <a type="button" href="/acomodacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(function () {
    $("[data-toggle='toggle']").bootstrapToggle({
      size: "small",
    });
  });
  $(".numero").mask("000000000");
</script>
@endsection
