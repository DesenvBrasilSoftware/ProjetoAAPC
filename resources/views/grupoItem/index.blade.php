@extends('template')
@section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Descrição</th>
      <!-- <th>Perecivel</th>
      <th>Refrigerado</th> -->
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        {{ $obj->descricao }}
      </td>
      <!-- <td>
        @if($obj->perecivel == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true">
        @endif
      </td>
      <td>
        @if($obj->refrigerado == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true">
        @endif
      </td> -->
      <td width="1%">
        <a href="/grupoItem.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit"
          style="align-content: center"></i></a>
      </td>
      <td width="1%">
        <a href="/grupoItem.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
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
  btnIncluir.href = '/grupoItem.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
