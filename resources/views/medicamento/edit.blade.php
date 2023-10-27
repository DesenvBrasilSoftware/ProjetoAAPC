@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/medicamento.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
      value="{{ $obj->nome }}" autofocus placeholder="Informe o nome do medicamento...>
  </div>
  <div class="form-group">
    <label for="principio_ativo">Princípio ativo:</label>
    <input type="text" name="principio_ativo" class="form-control" id="principio_ativo" maxlength="45"
      value="{{ $obj->principio_ativo }}" placeholder="Informe o princípio ativo...">
  </div>
  <div class="form-group">
    <label for="classificacao">Classificação:</label>
    <select name="classificacao" class="form-control" id="classificacao">
      <option value="" label="Selecione uma classificação"></option>
      <option value="R" label="Referência" {{ $obj->classificacao == 'R' ? 'selected' : '' }}></option>
      <option value="S" label="Similar" {{ $obj->classificacao == 'S' ? 'selected' : '' }}></option>
      <option value="G" label="Genérico" {{ $obj->classificacao == 'G' ? 'selected' : '' }}></option>
    </select>
  </div>
  <div class="form-group">
    <label for="classe_terapeutica_id">Classe Terapêutica:</label>
    <select name="classe_terapeutica_id" class="form-control" id="classe_terapeutica_id" maxlength="45">
      <option value="" label="Selecione a classe terapêutica..."></option>
      @foreach ($listaClasseTerapeutica as $classe_terapeutica)
      <option value="{{ $classe_terapeutica->id }}" label="{{ $classe_terapeutica->descricao }}"
      @if($obj->classe_terapeutica_id == $classe_terapeutica->id)
      selected
      @endif
      >{{ $classe_terapeutica->descricao }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <a type="button" href="/medicamento.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
