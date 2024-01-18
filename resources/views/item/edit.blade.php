@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/item.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}" />
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="120" value="{{ $obj->descricao }}" autofocus />
  </div>
  <div class="form-group" id="quantidade_id">
    <label for="quantidade">Quantidade:</label>
    <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $obj->quantidade }}"
      placeholder="Informe a quantidade..." step="any">
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
  <div id="dataTableContainer">
    <table id="dataTable" class="table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <th>Item</th>
          <th style="text-align: right;">Quantidade</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaKitItem as $kitItem)
        <tr>
          <td>
            {{ $kitItem->item }}
          </td>
          <td style="text-align: right;">
            {{ number_format($kitItem->quantidade, 4, ',', '.') }}
          </td>
          <td width="1%">
            <a data-toggle="modal" data-target="#modalKitItem"
              onclick="abreModalEditKitItem(
              '{{ $kitItem->id }}',
              '{{ $kitItem->item_composicao_id }}',
              '{{ $kitItem->quantidade }}'
              )">
            <i class="fa fa-lg fa-edit"></i>
            </a>
          </td>
          <td width="1%">
            <a
              onclick="deletarKitItem('{{ $kitItem->id }}', '{{ $obj->id }}')">
            <i class="fa fa-lg fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="form-group">
      <button onclick="abreModalKitItem()" type="button" class="btn btn-secondary" data-toggle="modal"
        data-target="#modalKitItem">
      Adicionar item
      </button>
    </div>
  </div>
  <div class="form-group">
    <a href="/item.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@include('item/modal_kit')
<script>
  $(document).ready(function(){
      if (!$('#kit').prop('checked')) {
          $('#dataTableContainer').hide();
      }
      $('#kit').change(function(){
          if($(this).prop('checked')){
              $('#dataTableContainer').show();
          } else {
              $('#dataTableContainer').hide();
          }
      });
        if ($('#kit').prop('checked')) {
          $('#quantidade_id').hide();
        }
        $('#kit').change(function(){
            if($(this).prop('checked')){
                $('#quantidade_id').hide();
            } else {
                $('#quantidade_id').show();
            }
        });
  });
</script>
@endsection
