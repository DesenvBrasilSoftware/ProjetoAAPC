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
      <label for="quantidade">Quantidade:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $obj->quantidade }}"
          placeholder="Informe a quantidade...">
    </div>
  <div class="form-group">
    <label for="grupo_item_id">Grupo do item:</label>
    <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
      <option value="" label="Selecione o grupo de item..."></option>
      @if (isset($listaGrupoItem))
        @foreach ($listaGrupoItem as $grupoItem)
        <option value="{{ $grupoItem->id }}" label="{{ $grupoItem->descricao }}"
        @if($obj->grupo_item_id == $grupoItem->id)
            selected
        @endif
        ></option>
        @endforeach
      @endif
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
      <label for="medicamento_id">Medicamento:</label>
      <select name="medicamento_id" class="form-control" id="medicamento_id" maxlength="45">
        <option value="" label="Selecione o medicamento..."></option>
        @foreach ($listaMedicamento as $medicamento)
        <option value="{{ $medicamento->id }}" label="{{ $medicamento->nome }}"
        @if($obj->medicamento_id == $medicamento->id)
            selected
        @endif
        >{{ $medicamento->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="kit">Kit:</label>
        <input type="checkbox" name="kit" id="kit" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->kit ? 'checked' : '' }}>
    </div>
  <div class="form-group">
    <a href="/item.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
