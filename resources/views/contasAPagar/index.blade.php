@extends('template')
@section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Data</th>
      <th>Pessoa</th>
      <th style="text-align: right;">Valor a Pagar</th>
      <th style="text-align: right;">Valor Pago</th>
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
        @if ($obj->data)
        {{ date('d/m/Y', strtotime($obj->data)) }}
        @endif
      </td>
      <td>
        {{ $obj->pessoa }}
      </td>
      <td style="text-align: right;">
        {{ number_format($obj->valor_a_pagar, 2, ',', '.') }}
      </td>
      <td style="text-align: right;">
        {{ number_format($obj->valor_pago, 2, ',', '.') }}
      </td>
      <td width="1%">
        <a href="/contasAPagar.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center"></i></a>
      </td>
      <td width="1%">
        <a href="/contasAPagar.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
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
  btnIncluir.href = '/contasAPagar.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
