@extends('template') @section('conteudo')
<div class="form-group">
<a type="button" href="/item.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="display">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Descrição</th>
      <th>Grupo de item</th>
      <th>Medicamento</th>
      <th style="text-align: right;">Quantidade</th>
      <th>Kit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}" />
    <tr>
      <td width="1%">
        <a href="/item.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center;"></i></a>
      </td>
      <td width="1%">
        <a href="/item.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
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
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
