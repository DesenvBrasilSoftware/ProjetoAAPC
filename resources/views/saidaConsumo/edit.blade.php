@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/saidaConsumo.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}" />
  <div class="form-group">
    <!-- <label for="usuario_id">Usuário:</label> -->
    <input type="hidden" class="form-control" id="usuario_id" name="usuario_id" value="{{Auth::user()->id}}" />
  </div>
  <div class="form-group">
    <label for="data">Data:</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da saída..." value="{{ $obj->data }}"/>
  </div>
  <table id="dataTable" class="display table-responsive">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaSaidaConsumoItem as $saidaConsumoItem)
      <tr>
        <td>
          {{ $saidaConsumoItem->item }}
        </td>
        <td>
          {{ number_format($saidaConsumoItem->quantidade, 4, ',', '.') }}
        </td>
        <td width="1%">
          <a data-toggle="modal" data-target="#modalSaidaConsumoItem"
            onclick="abreModalEditSaidaConsumoItem(
            '{{ $saidaConsumoItem->id }}',
            '{{ $saidaConsumoItem->quantidade }}',
            '{{ $saidaConsumoItem->item_id }}')
            "><i
            class="fa fa-lg fa-edit"></i></a>
        </td>
        <td width="1%">
          <a
            onclick="deletarSaidaConsumoItem('{{ $saidaConsumoItem->id }}', '{{ $obj->id }}')">
          <i class="fa fa-lg fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="form-group">
    <button onclick="abreModalSaidaConsumoItem()" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSaidaConsumoItem">
    Adicionar item
    </button>
  </div>
  <div class="form-group">
      <a href="/saidaConsumo.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@include('saidaConsumo/modal_item')
@endsection
