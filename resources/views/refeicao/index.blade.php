@extends('template')
@section('conteudo')
<div class="custom-data-table">
<table id="dataTable" class="display table-responsive">
  <thead>
    <tr>
      <th>Código</th>
      <th>Data</th>
      <th>Tipo</th>
      <th>Paciente</th>
      <th>Acompanhante</th>
      <th>Servida</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista as $obj)
    <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
    <tr>
      <td>
        {{$obj->id}}
      </td>
      <td>
        @if ($obj->data)
          {{ date('d/m/Y', strtotime($obj->data)) }}
        @endif
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
      <td width="1%">
        <a href="/refeicao.edit.{{ $obj->id }}"><i class="fa fa-lg fa-edit" style="align-content: center"></i></a>
      </td>
      <td width="1%">
        <a href="/refeicao.delete.{{ $obj->id }}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-lg fa-trash"></i></a>
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
  btnIncluir.href = '/refeicao.create';
  btnIncluir.className = 'btn btn-primary';
  btnIncluir.innerText = 'Incluir';

  // Adiciona o botão ao DOM
  document.querySelector('.card-title div:last-child').appendChild(btnIncluir);
</script>
@endsection
