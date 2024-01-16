@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/acomodacao.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="45"
      value="{{ $obj->descricao }}" autofocus placeholder="Informe a descrição">
  </div>
  <table id="dataTable" class="table-responsive table-stripped table-bordered">
    <thead>
      <tr>
        <th>Leito</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaLeitosAcomodacao as $leitoAcomodacao)
      <tr>
        <td>
          {{ $leitoAcomodacao->descricao }}
        </td>
        <td width="1%">
        <a data-toggle="modal" data-target="#modalLeitoAcomodacao"
          onclick="abreModalEditLeitoAcomodacao(
              '{{ $leitoAcomodacao->id }}',
              '{{ $leitoAcomodacao->descricao }}'
          )">
          <i class="fa fa-lg fa-edit"></i>
        </a>
        </td>
        <td width="1%">
          <a
            onclick="deletarLeitoAcomodacao('{{ $leitoAcomodacao->id }}', '{{ $obj->id }}')">
          <i class="fa fa-lg fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="form-group">
    <button onclick="abreModalLeitoAcomodacao()" type="button" class="btn btn-secondary" data-toggle="modal"
      data-target="#modalLeitoAcomodacao">
    Adicionar leito
    </button>
  </div>
  <div class="form-group">
    <label for="refrigerado">Refrigerado:</label>
    <input type="checkbox" name="refrigerado" id="refrigerado" data-toggle="toggle" data-on="Sim"
    data-off="Não" {{ $obj->refrigerado ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <a type="button" href="/acomodacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@include('acomodacao/modal_leito')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(function() {
      $("[data-toggle='toggle']").bootstrapToggle({
          size: "small",
      });
  });
</script>
@endsection
