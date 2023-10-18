@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/paciente.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table table-stripped">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Nome</th>
      <th>Data de nascimento</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td width="1%">
        <a href="/paciente.edit.{{ $obj->id }}"><i class="fa fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/paciente.delete.{{ $obj->id }}"><i class="fa fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->nome }}
      </td>
      <td>
        {{ $obj->data_nascimento }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
