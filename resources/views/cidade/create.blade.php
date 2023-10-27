@extends('template')
@section('conteudo')
<div class="d-flex align-items-center p-2 rounded mb-5" style="background-color: #343957fe;">
  <i class="ti-map-alt" style="font-size: 24px; color: #fff;"></i>
  <h4 class="mb-0 ml-2 text-white" style="color: #bbb !important;">Cadastro de Cidades</h4>
</div>
<form id="form" action="/cidade.store" method="post">
  @csrf
    <div class="form-group">
      <label for="cid">Estado:</label>
      <select name="uf_id" class="form-control" id="uf" required>
        @foreach($estados as $estado)
        <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text"
        name="nome"
        class="form-control"
        id="nome"
        maxlength="120"
        value="{{old('nome')}}"
        autofocus
        required
        placeholder="Informe o nome da cidade..."
        >
    </div>
  <div class="form-group">
      <a type="button" href="/cidade.index" class="btn btn-warning">Cancelar</a>
      <button type="submit" class="btn btn-primary mr-3">Salvar</button>
  </div>
</form>
@endsection
