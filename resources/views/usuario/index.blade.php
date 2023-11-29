@extends('template')
@section('conteudo')
<div class="form-group">
  <a type="button" href="/usuario.create" class="btn btn-primary">Incluir</a>
</div>
<table id="dataTable" class="table table-stripped">
  <thead>
    <tr>
      <th>Alterar</th>
      <th>Excluir</th>
      <th>Nome</th>
      <th>Login</th>
      <th>Acomodação</th>
      <th>Localidade</th>
      <th>Pessoa</th>
      <th>Paciente</th>
      <th>Refeição</th>
      <th>Doações</th>
      <th>Financeiro</th>
      <th>Classe Terapêutica</th>
      <th>Enfermidade</th>
      <th>Estoque</th>
      <th>Medicamento</th>
      <th>Usuário</th>
      <th>Relatórios</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $obj)
    <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">
    <tr>
      <td width="1%">
        <a href="/usuario.edit.{{$obj->id}}"><i class="fa fa-edit"></i></a>
      </td>
      <td width="1%">
        <a href="/usuario.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');">
        <i class="fa fa-trash"></i></a>
      </td>
      <td>
        {{$obj->nome}}
      </td>
      <td>
        {{$obj->login}}
      </td>
      <td>
        @if($obj->visualiza_acomodacao == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_localidade == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_pessoa == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_paciente == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_refeicao == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_doacoes == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_financeiro == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_classe_terapeutica == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_enfermidade == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_estoque == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_medicamentos == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_usuarios == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
      <td>
        @if($obj->visualiza_relatorios == 0)
          <i class="fa fa-lg fa-square-o" aria-hidden="true"></i>
        @else
          <i class="fa fa-lg fa-check-square-o" aria-hidden="true"></i>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
