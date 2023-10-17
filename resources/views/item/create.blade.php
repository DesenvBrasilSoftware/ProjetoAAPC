@extends('template')
@section('conteudo')
<div class="container">
  <form class="needs-validation" novalidate id="form" action="/item.store" method="post">
    @csrf
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="60" value="{{ old('descricao') }}" autofocus placeholder="Digite a descrição do item" />
    </div>
    <div class="form-group">
      <label for="grupo_item_id">Grupo do item:</label>
      <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
        <option value="" label="Selecione um grupo de item..." selected></option>
        @foreach ($listaGrupoItem as $grupoItem)
        <option value="{{ $grupoItem->id }}" label="{{ $grupoItem->descricao }}">{{ $grupoItem->descricao }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-row">
      <div class="form-group col-6">
        <label for="fabricacao">Data de fabricação:</label>
        <input type="date" class="form-control" id="fabricacao" name="fabricacao" placeholder="Selecione a data de fabricação" />
      </div>
      <div class="form-group col-6">
        <label for="validade">Data de Validade:</label>
        <input type="date" class="form-control" id="validade" name="validade" placeholder="Selecione a data de validade" />
      </div>
    </div>
    <div class="form-group">
      <label for="medicamento_id">Medicamento:</label>
      <select name="medicamento_id" class="form-control" id="medicamento_id" maxlength="45">
        <option value="" label="Selecione o medicamento..." selected></option>
        @foreach ($listaMedicamento as $medicamento)
        <option value="{{ $medicamento->id }}" label="{{ $medicamento->nome }}">{{ $medicamento->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="kit">Kit:</label>
        <input type="checkbox" name="kit" id="kit" data-toggle="toggle" data-on="Sim"
        data-off="Não" {{ old('kit') ? 'checked' : 'ssss' }}>
    </div>
    <div class="form-group">
      <a href="/item.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
</div>
@endsection
