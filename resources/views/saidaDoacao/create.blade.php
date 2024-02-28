@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/saidaDoacao.store" method="post">
  @csrf

  <div class="form-group">
    <label for="pessoa_doador_id">Doador:</label>

    <select required name="pessoa_doador_id" class="form-control" id="pessoa_doador_id" maxlength="45">
      <option value="" label="Selecione um doador..." selected></option>
      @foreach ($listaPessoa as $pessoa)

      <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->descricao }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="pessoa_donatario_id">Donatário:</label>

    <div class="form-check form-switch">
        <label for="radio">Paciente</label>
        <input type="checkbox" class="form-check-input" name="radio" id="radio" data-toggle="toggle" data-on="Sim" data-off="Não">
    </div>

    <br>

    <select name="pessoa_donatario_id" class="form-control" id="pessoa_donatario_id" maxlength="45">
        <option value="" label="Selecione um donatário..." selected></option>
        @foreach ($listaPessoa as $pessoa)

        <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->descricao }}</option>
        @endforeach
    </select>

    <select name="paciente_donatario_id" class="form-control" id="paciente_donatario_id" maxlength="45" style="display:none;">
        <option value="" label="Selecione um donatário..." selected></option>
        @foreach ($listaPaciente as $paciente)

        <option value="{{ $paciente->id }}" label="{{ $paciente->nome }}">{{ $paciente->descricao }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="data">Data:</label>

    <input type="date" class="form-control" id="data" name="data" placeholder="Informe a data da doação..." />
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
@endsection
