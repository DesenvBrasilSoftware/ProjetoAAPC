@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/enfermidade.store" method="post">
  @csrf
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text"
      name="descricao"
      class="form-control"
      id="descricao"
      maxlength="120"
      value="{{old('descricao')}}"
      autofocus
      >
  </div>
  <div class="form-group">
    <label for="cid">CID</label>
    <input type="text"
      name="cid"
      class="form-control"
      id="cid"
      maxlength="45"
      value="{{old('cid')}}"
      >
  </div>
  <div class="form-group">
    <a type="button" href="/enfermidade.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
