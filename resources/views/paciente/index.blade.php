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
      <th>Código</th>
      <th>Nome</th>
      <th style="text-align:left">Data de cadastro</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
      <td width="1%">
        <a href="/paciente.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/paciente.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->id }}
      </td>
      @if ($obj->data_obito != null || $obj->data_obito != '')
      <td style="color: red">
        {{ $obj->nome }}
      </td>
      @else
      <td>
        {{ $obj->nome }}
      </td>
    @endif
      <td style="text-align:left">
        @if ($obj->data_cadastro)
            {{ date('d/m/Y', strtotime($obj->data_cadastro)) }}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

