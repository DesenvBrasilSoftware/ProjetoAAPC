@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/saidaDoacao.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}" />
  <div class="form-group">
    <label for="pessoa_id">Doador:</label>
    <select required name="pessoa_id" class="form-control" id="pessoa_id" maxlength="45">
      <option value="" label="Selecione um doador..." selected></option>
      @foreach ($listaPessoa as $pessoa)
      <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}"
        @if($obj->pessoa_id == $pessoa->id)
            selected
        @endif
      >{{ $pessoa->descricao }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="data">Data:</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da doação..." value="{{ $obj->data }}"/>
  </div>
  <table id="dataTable" class="table table-stripped">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaSaidaDoacaoItem as $saidaDoacaoItem)
      <tr>
        <td>
          {{ $saidaDoacaoItem->item }}
        </td>
        <td>
          {{ $saidaDoacaoItem->quantidade }}
        </td>
        <td width="1%">
          <a data-toggle="modal" data-target="#modalSaidaDoacaoItem"
            onclick="abreModalEditSaidaDoacaoItem(
            '{{ $saidaDoacaoItem->id }}',
            '{{ $saidaDoacaoItem->quantidade }}',
            '{{ $saidaDoacaoItem->item_id }}')
            "><i
            class="fa fa-lg fa-edit"></i></a>
        </td>
        <td width="1%">
          <a
            onclick="deletarSaidaDoacaoItem('{{ $saidaDoacaoItem->id }}', '{{ $obj->id }}')">
          <i class="fa fa-lg fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="form-group">
    <button onclick="abreModalSaidaDoacaoItem()" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSaidaDoacaoItem">
    Adicionar item
    </button>
  </div>
  <div class="form-group">
      <a href="/saidaDoacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@include('saidaDoacao/modal_item')
@endsection
