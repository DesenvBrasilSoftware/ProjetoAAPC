@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/paciente.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table-responsive table-stripped table-bordered">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Nome</th>
      <th style="text-align:left">Data de nascimento</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td width="1%">
        <a href="/paciente.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/paciente.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->nome }}
      </td>
      <td style="text-align:left">
        @if ($obj->data_nascimento)
            {{ date('d/m/Y', strtotime($obj->data_nascimento)) }}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
