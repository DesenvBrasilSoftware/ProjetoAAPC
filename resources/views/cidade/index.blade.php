@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/cidade.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table-responsive table-stripped table-bordered">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Nome</th>
      <th style="text-align:left">UF</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $obj)
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">
    <tr>
      <td width="1%">
        <a href="/cidade.edit.{{$obj->id}}"><i class="fa fa-lg fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/cidade.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');">
        <i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{$obj->nome}}
      </td>
      <td style="text-align:left">
        @foreach($estados as $estado)
        @if($estado->id == $obj->uf_id)
        {{$estado->nome}}
        @endif
        @endforeach
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
