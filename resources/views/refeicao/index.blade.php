@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/refeicao.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table-responsive table-stripped table-bordered">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Data</th>
      <th>Tipo</th>
      <th>Paciente</th>
      <th>Acompanhante</th>
      <th>Servida</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td width="1%">
        <a href="/refeicao.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center"></i></a>
      </td>
      <td width="1%">
        <a href="/refeicao.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{ $obj->data }}
      </td>
      <td>
        {{ $obj->tipo }}
      </td>
      <td>
        {{ $obj->paciente }}
    </td>
    <td>
        {{ $obj->acompanhante }}
      </td>
      <td>
        @if($obj->servida == 0)
            <a href="/refeicao.servir.{{ $obj->id }}" onclick="return confirm('Confirmar que a refeição foi servida?');"><i class="fa fa-lg fa-square-o" aria-hidden="true"></i></a>
        @else
            <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
