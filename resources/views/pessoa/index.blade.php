@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/pessoa.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table-responsive table-stripped table-bordered">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Nome</th>
      <th>Colaborador</th>
      <th>Profissional</th>
      <th>Voluntário</th>
      <th>Fornecedor</th>
      <th>Clínica</th>
      <th>CPF/CNPJ</th>
      <th>Data cadastro</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $obj)
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">
    <tr>
      <td width="1%">
        <a href="/pessoa.edit.{{$obj->id}}"><i class="fa fa-lg fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/pessoa.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
      <td>
        {{$obj->nome}}
      </td>
      <td>
        {{$obj->colaborador}}
      </td>
      <td>
        {{$obj->profissional}}
      </td>
      <td>
        {{$obj->voluntario}}
      </td>
      <td>
        {{$obj->fornecedor}}
      </td>
      <td>
        {{$obj->clinica}}
      </td>
      <td>
        {{ $obj->cpf ? $obj->cpf : $obj->cnpj }}
      </td>
      <td>
        {{$obj->data_cadastro}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
