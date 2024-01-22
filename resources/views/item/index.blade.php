@extends('template') @section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Descrição</th>
      <th>Grupo de item</th>
      <th>Medicamento</th>
      <th style="text-align: right;">Quantidade</th>
      <th>Kit</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}" />
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        {{ $obj->descricao }}
      </td>
      <td>
        {{ $obj->grupo_item }}
      </td>
      <td>
        {{ $obj->medicamento }}
      </td>
      <td style="text-align: right;">
        {{ number_format($obj->quantidade, 4, ',', '.') }}
      </td>
      <td style="text-align: center;">
        @if($obj->kit == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true">
          @endif
        </td>
        <td width="1%">
          <a href="/item.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center;"></i></a>
        </td>
        <td width="1%">
          <a href="/item.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<script>
  // Criação dinâmica do botão "Incluir"
  var btnIncluir = document.createElement('a');
  btnIncluir.id = 'btn-incluir';
  btnIncluir.type = 'button';
  btnIncluir.href = '/item.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
