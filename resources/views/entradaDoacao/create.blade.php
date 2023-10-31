@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/item.store" method="post">
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
  <table id="tabela_itens" class="table table-stripped">
    <caption>Lista de itens para doação</caption>
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantidade</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
  </table>
</form>
<div class="form-group">
  <button onclick="abreModalItem()" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalItem">
  Adicionar item
  </button>
</div>
@include('entradaDoacao/modal_item')
@endsection