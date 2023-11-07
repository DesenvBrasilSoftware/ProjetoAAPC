@extends('template')
@section('conteudo')
<div class="d-flex align-items-center p-2 rounded mb-5" style="background-color: #343957fe;">
  <i class="ti-map-alt" style="font-size: 24px; color: #fff;"></i>
  <h4 class="mb-0 ml-2 text-white" style="color: #bbb !important;">Edição de cidade</h4>
</div>
<form id="form" action="/cidade.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{$obj->id}}">
  <div class="row">
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input
        type="text"
        name="nome"
        class="form-control"
        id="nome"
        maxlength="120"
        value="{{$obj->nome}}"
        autofocus
        placeholder="Informe o nome da cidade..."
        >
    </div>
  </div>
  <div class="row">
    <div class="form-group">
      <label for="cid">Estado</label>
      <select name="uf_id" class="form-control" id="uf" required>
        @foreach($estados as $estado)
        <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
      <a type="button" href="/cidade.index" class="btn btn-warning">Cancelar</a>
      <button type="submit" class="btn btn-primary mr-3">Salvar</button>
  </div>
</form>
@endsection
