@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/item.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}" />
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="120" value="{{ $obj->descricao }}" autofocus />
  </div>
  <div class="form-group">
    <label for="grupo_item_id">Grupo do item:</label>
    <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
      <option value="">Selecione um grupo de item</option>
      <option value="{{ $obj->grupo_item_id }}" label="{{ $obj->grupo_item_id }}" selected></option>
      @if (isset($listaGrupoItem)) @foreach ($listaGrupoItem as $grupoItem)
      <option value="{{ $grupoItem->id }}" label="{{ $grupoItem->descricao }}"></option>
      @endforeach @endif
    </select>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="fabricacao">Data de fabricação:</label>
      <input type="date" class="form-control" id="fabricacao" name="fabricacao" value="{{ $obj->fabricacao }}" />
    </div>
    <div class="form-group col-6">
      <label for="validade">Data de Validade:</label>
      <input type="date" class="form-control" id="validade" name="validade" value="{{ $obj->validade }}" />
    </div>
  </div>
  <div class="form-group">
    <label for="kit">Kit:</label>
    <input required type="text" name="kit" class="form-control" id="kit" maxlength="120" value="{{ $obj->kit }}" autofocus />
  </div>
  <div class="form-group">
    <label for="medicacao_id">Medicamento:</label>
    <input type="text" name="medicacao_id" class="form-control" id="medicacao_id" maxlength="120" value="{{ $obj->medicamento_id }}" autofocus />
  </div>
  <div class="form-group">
    <a href="/enfermidade.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
