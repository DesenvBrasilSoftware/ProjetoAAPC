@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/entradaDoacao.store" method="post">
  @csrf
  <div class="form-group">
    <label for="pessoa_id">Doador:</label>
    <select required name="pessoa_id" class="form-control" id="pessoa_id" maxlength="45">
      <option value="" label="Selecione um doador..." selected></option>
      @foreach ($listaPessoa as $pessoa)
      <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->descricao }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="data">Data:</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da doação..." />
  </div>
  <div class="form-group">
      <a href="/entradaDoacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
