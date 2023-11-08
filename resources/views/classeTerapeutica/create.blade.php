@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/classeTerapeutica.store" method="post">
  @csrf
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" class="form-control" id="nome" maxlength="120"
      value="{{ old('descricao') }}" autofocus>
  </div>
  <div class="form-group">
    <a type="button" href="/classeTerapeutica.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
