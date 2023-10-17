@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/item.store" method="post">
  @csrf
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="60" value="{{ old('descricao') }}" autofocus placeholder="Digite a descrição do item" />
  </div>
  <div class="form-group">
    <label for="grupo_item_id">Grupo do item:</label>
    <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
      <option value="" label="Selecione um grupo de item" selected></option>
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
    <label for="kit">Kit:</label>
    <input type="text" name="kit" class="form-control" id="kit" maxlength="120" value="{{ old('kit') }}" autofocus placeholder="Digite o nome do kit" />
  </div>
  <div class="form-group">
    <label for="medicacao_id">Medicamento:</label>
    <input type="text" name="medicacao_id" class="form-control" id="medicacao_id" maxlength="120" value="{{ old('medicacao_id') }}" autofocus placeholder="Digite o nome do medicamento" />
  </div>
  <div class="form-group">
    <a type="button" href="/item.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
