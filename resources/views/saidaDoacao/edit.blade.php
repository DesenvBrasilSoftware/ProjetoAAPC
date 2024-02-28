@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/saidaDoacao.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}" />

  <div class="form-group">
    <label for="pessoa_doador_id">Doador:</label>

    <select required name="pessoa_doador_id" class="form-control" id="pessoa_doador_id" maxlength="45">
      <option value="" label="Selecione um doador..." selected></option>
      @foreach ($listaPessoa as $pessoa)

      <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}"
        @if($obj->pessoa_doador_id == $pessoa->id)
            selected
        @endif
      >{{ $pessoa->descricao }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="pessoa_donatario_id">Donatário:</label>

    <div class="form-check form-switch">
        <label for="radio">Paciente</label>
        <input type="checkbox" class="form-check-input" name="radio" id="radio" data-toggle="toggle" data-on="Sim" data-off="Não" @if(!is_null($obj->paciente_donatario_id)) checked @endif>
    </div>

    <br>

    <select name="pessoa_donatario_id" class="form-control" id="pessoa_donatario_id" maxlength="45" @if(!is_null($obj->paciente_donatario_id)) style="display:none;" @endif>
        <option value="" label="Selecione um donatário..." selected></option>
        @foreach ($listaPessoa as $pessoa)
            <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}" @if($obj->pessoa_donatario_id == $pessoa->id) selected @endif>{{ $pessoa->descricao }}</option>
        @endforeach
    </select>

    <select name="paciente_donatario_id" class="form-control" id="paciente_donatario_id" maxlength="45" @if(is_null($obj->paciente_donatario_id)) style="display:none;" @endif>
        <option value="" label="Selecione um donatário..." selected></option>
        @foreach ($listaPaciente as $paciente)
            <option value="{{ $paciente->id }}" label="{{ $paciente->nome }}" @if($obj->paciente_donatario_id == $paciente->id) selected @endif>{{ $paciente->descricao }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="data">Data:</label>

    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da doação..." value="{{ $obj->data }}"/>
  </div>

  <table id="dataTable" class="display table-responsive">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaSaidaDoacaoItem as $saidaDoacaoItem)
      <tr>
        <td>
          {{ $saidaDoacaoItem->item }}
        </td>
        <td>
          {{ number_format($saidaDoacaoItem->quantidade, 4, ',', '.') }}
        </td>
        <td width="1%">
          <a data-toggle="modal" data-target="#modalSaidaDoacaoItem"
            onclick="abreModalEditSaidaDoacaoItem(
            '{{ $saidaDoacaoItem->id }}',
            '{{ $saidaDoacaoItem->quantidade }}',
            '{{ $saidaDoacaoItem->item_id }}')
            "><i
            class="fa fa-lg fa-edit"></i></a>
        </td>
        <td width="1%">
          <a
            onclick="deletarSaidaDoacaoItem('{{ $saidaDoacaoItem->id }}', '{{ $obj->id }}')">
          <i class="fa fa-lg fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="form-group">
    <button onclick="abreModalSaidaDoacaoItem()" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSaidaDoacaoItem">
    Adicionar item
    </button>
  </div>
  <div class="form-group">
      <a href="/saidaDoacao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $("#radio").on("change", function() {
          var checkbox = $(this);
          var pessoaSelect = $("#pessoa_donatario_id");
          var pacienteSelect = $("#paciente_donatario_id");

          if (checkbox.prop("checked")) {
              pacienteSelect.show();
              pessoaSelect.hide();
          } else {
              pacienteSelect.hide();
              pessoaSelect.show();
          }
      });
  });
</script>
@include('saidaDoacao/modal_item')
@endsection
