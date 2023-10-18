@extends('template')
@section('conteudo')
<form id="form" action="/acomodacao.store" method="post">
  @csrf
  <div class="form-group">
    <label required for="descricao">Descrição</label>
    <input type="text" name="descricao" class="form-control" id="descricao" maxlength="45"
    value="{{ old('descricao') }}" autofocus placeholder="Informe a descrição" />
  </div>
  <div class="form-group">
    <label for="leitos">Leitos:</label>
    <input type="text" name="leitos" class="form-control" id="leitos" maxlength="11"
    value="{{ old('leitos') }}" placeholder="Informe o número de leitos" />
  </div>
  <div class="form-group">
    <label for="leitos_livres">Leitos livres:</label>
    <input type="text" name="leitos_livres" class="form-control" id="leitos_livres"
    maxlength="11" value="{{ old('leitos_livres') }}" placeholder="Informe o número de leitos livres" />
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
<script>
  $(function () {
    $("[data-toggle='toggle']").bootstrapToggle({
      size: "small",
    });
  });
</script>

@endsection
