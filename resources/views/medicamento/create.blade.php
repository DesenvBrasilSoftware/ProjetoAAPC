@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/medicamento.store" method="post">
  @csrf
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
      value="{{ old('nome') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="principio_ativo">Princípio ativo:</label>
    <input type="text" name="principio_ativo" class="form-control" id="principio_ativo" maxlength="45"
      value="{{ old('principio_ativo') }}">
  </div>
  <div class="form-group">
    <label for="classificacao">Classificação:</label>
    <select name="classificacao" class="form-control" id="classificacao">
      <option value="" label="Selecione uma classificação" selected></option>
      <option value="R" label="Referência"></option>
      <option value="S" label="Similar"></option>
      <option value="G" label="Genérico"></option>
    </select>
  </div>
  <div class="form-group">
    <label for="classe_terapeutica_id">Classe Terapêutica:</label>
    <select name="classe_terapeutica_id" class="form-control" id="classe_terapeutica_id" maxlength="45">
    <option value="" label="Selecione a classe terapêutica..." selected></option>
    @foreach ($listaClasseTerapeutica as $classe_terapeutica)
    <option value="{{ $classe_terapeutica->id }}" label="{{ $classe_terapeutica->descricao }}">{{ $classe_terapeutica->descricao }}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
      <a type="button" href="/medicamento.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
