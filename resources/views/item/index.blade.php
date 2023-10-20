@extends('template') @section('conteudo')
<div class="form-group">
<a type="button" href="/item.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table table-stripped">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Descrição</th>
      <th>Grupo de item</th>
      <th>Validade</th>
      <th>Kit</th>
      <th>Medicamento</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}" />
    <tr>
      <td width="1%">
        <a href="/item.edit.{{ $obj->id }}"><i class="fa fa-edit" style="align-content: center;"></i></a>
      </td>
      <td width="1%">
        <a href="/item.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->descricao }}
      </td>
      <td>
        {{ $obj->Validade }}
      </td>
      <td>
        {{ $obj->grupo_item_id }}
      </td>
      <td>
        {{ $obj->kit }}
      </td>
      <td>
        {{ $obj->medicamento_id }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
