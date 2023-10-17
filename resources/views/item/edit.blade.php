@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/item.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $item->id }}" />
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="120" value="{{ $item->descricao }}" autofocus />
  </div>
  <div class="form-group">
    <label for="grupo_item_id">Grupo do item:</label>
    <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
      <option value="" label="Selecione o grupo de item..."></option>
      @if (isset($listaGrupoItem))
        @foreach ($listaGrupoItem as $grupoItem)
        <option value="{{ $grupoItem->id }}" label="{{ $grupoItem->descricao }}"
        @if($item->grupo_item_id == $grupoItem->id)
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
      <input type="date" class="form-control" id="fabricacao" name="fabricacao" value="{{ $item->fabricacao }}" />
    </div>
    <div class="form-group col-6">
      <label for="validade">Data de Validade:</label>
      <input type="date" class="form-control" id="validade" name="validade" value="{{ $item->validade }}" />
    </div>
  </div>
  <div class="form-group">
      <label for="medicamento_id">Medicamento:</label>
      <select name="medicamento_id" class="form-control" id="medicamento_id" maxlength="45">
        <option value="" label="Selecione o medicamento..."></option>
        @foreach ($listaMedicamento as $medicamento)
        <option value="{{ $medicamento->id }}" label="{{ $medicamento->nome }}"
        @if($item->medicamento_id == $medicamento->id)
            selected
        @endif
        >{{ $medicamento->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="kit">Kit:</label>
        <input type="checkbox" name="kit" id="kit" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $item->kit ? 'checked' : '' }}>
    </div>
  <div class="form-group">
    <a href="/item.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
