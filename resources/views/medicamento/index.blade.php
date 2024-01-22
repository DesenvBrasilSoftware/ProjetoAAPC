@extends('template') @section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>Princípio ativo</th>
      <th>Classificação</th>
      <th style="text-align: left">Classe terapêutica</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}" />
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        {{ $obj->nome }}
      </td>
      <td>
        {{ $obj->principio_ativo }}
      </td>
      <td>
        {{ $obj->classificacao === 'R' ? 'Referência' : ($obj->classificacao === 'S' ? 'Similar' : ($obj->classificacao === 'G' ? 'Genérico' : 'Desconhecido')) }}
      </td>
      <td style="text-align: left">
        {{ $obj->classe_terapeutica }}
      </td>
      <td width="1%">
        <a href="/medicamento.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center;"></i></a>
      </td>
      <td width="1%">
        <a href="/medicamento.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
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
  btnIncluir.href = '/medicamento.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
