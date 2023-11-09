@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/contasAReceber.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table table-stripped">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Data</th>
      <th>Valor a Receber</th>
      <th>Valor Recebido</th>
      <th>Pessoa</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td width="1%">
        <a href="/contasAReceber.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center"></i></a>
      </td>
      <td width="1%">
        <a href="/contasAReceber.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->data }}
      </td>
      <td>
        {{ $obj->valor_a_receber }}
      </td>
      <td>
        {{ $obj->valor_recebido }}
    </td>
    <td>
        {{ $obj->pessoa }}
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
