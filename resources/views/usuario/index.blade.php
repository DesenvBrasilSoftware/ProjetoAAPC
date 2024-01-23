@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/usuario.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>Login</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $obj)
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        {{$obj->nome}}
      </td>
      <td>
        {{$obj->login}}
      </td>
      <td width="1%">
        <a href="/usuario.edit.{{$obj->id}}"><i class="fa fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/usuario.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');">
        <i class="fa fa-trash"></i></a>
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
  btnIncluir.href = '/contasAReceber.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
