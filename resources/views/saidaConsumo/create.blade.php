@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/saidaConsumo.store" method="post">
  @csrf
  <div class="form-group">
    <!-- <label for="usuario_id">Usuário:</label> -->
    <input type="hidden" class="form-control" id="usuario_id" name="usuario_id" value="{{Auth::user()->id}}" />
  </div>
  <div class="form-group">
    <label for="data">Data:</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da doação..." />
  </div>
  <div class="form-group">
      <a href="/saidaConsumo.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
