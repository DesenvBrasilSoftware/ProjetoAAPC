@extends('template') @section('conteudo')
<div class="form-group">
  <a type="button" href="/pessoa.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="display table-responsive">
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
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}" />
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
        @if($obj->colaborador == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>

      <td>
        @if($obj->profissional == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>

      <td>
        @if($obj->voluntario == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>

      <td>
        @if($obj->fornecedor == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>

      <td>
        @if($obj->clinica == 0)
        <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
        <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        {{ $obj->cpf ? preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $obj->cpf) : preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $obj->cnpj) }}
      </td>
      <td>
        @if ($obj->data_cadastro) {{ date('d/m/Y', strtotime($obj->data_cadastro)) }} @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
