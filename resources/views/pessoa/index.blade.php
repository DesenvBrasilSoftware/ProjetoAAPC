@extends('template') @section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>CPF/CNPJ</th>
      <th>Data cadastro</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $obj)
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}" />
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        {{$obj->nome}}
      </td>
      <td>
        {{ $obj->cpf ? preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $obj->cpf) : preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $obj->cnpj) }}
      </td>
      <td>
        @if ($obj->data_cadastro) {{ date('d/m/Y', strtotime($obj->data_cadastro)) }} @endif
      </td>
      <td width="1%">
        <a href="/pessoa.edit.{{$obj->id}}"><i class="fa fa-lg fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/pessoa.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<script>
  // Criação dinâmica do botão "Incluir"
  var btnIncluir = document.createElement('a');
  btnIncluir.id = 'btn-incluir';
  btnIncluir.type = 'button';
  btnIncluir.href = '/pessoa.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
