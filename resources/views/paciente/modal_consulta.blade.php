<!-- Modal Consulta Paciente -->
<div>
<div class="modal fade" id="modalConsultaPaciente" tabindex="-1" role="dialog"
    aria-labelledby="labelConsultaPaciente" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="labelConsultaPaciente">Cadastrar consulta do paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="/paciente.adicionarConsulta">
        @csrf
        <div class="modal-body">
            <input id="consulta_paciente_id" type="hidden" name="consulta_paciente_id">
            <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}">
            <div class="form-group">
            <label for="data_consulta_id">Data:</label>
            <input required type="date" class="form-control" id="data_consulta_id" name="data_consulta_id"
                placeholder="Informe a data da consulta...">
            </div>
            <div class="form-group">
            <label for="profissional_id">Profissional:</label>
            <select required name="profissional_id" class="form-control" id="profissional_id" maxlength="45">
                <option value="" label="Selecione o profissonal..."></option>
                @foreach ($listaProfissional as $profissional)
                <option value="{{ $profissional->id }}" label="{{ $profissional->nome }}">
                {{ $profissional->id }}
                </option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="observacoes">Observações:</label>
            <input type="text" class="form-control" id="observacoes" name="observacoes"
                placeholder="Adicionar alguma observação...">
            </div>
            <div class="form-group">
                <label for="realizada">Realizada:</label>
                <input type="checkbox" name="realizada" id="realizada" data-toggle="toggle" data-on="Sim" data-off="Não">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        </form>
    </div>
    </div>
</div>
<form id="deletarConsultaForm" method="POST" action="/paciente.deletarConsulta">
    @csrf
    <input type="hidden" name="delete_consulta_paciente_id" id="delete_consulta_paciente_id">
    <input type="hidden" name="delete_paciente_id" id="delete_paciente_id">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalConsultaPaciente').on('shown.bs.modal', function() {
    $('#data_consulta_id').trigger('focus');
  });

  function abreModalEditConsultaPaciente(id, dataConsulta, profissional_id, realizada, observacoes) {
    $('#consulta_paciente_id').val(id);
    $('#data_consulta_id').val(dataConsulta);
    $('#profissional_id').val(profissional_id);
    $('#realizada').val(realizada);
    $('#observacoes').val(observacoes);
  }

  function abreModalConsultaPaciente() {
    $('#consulta_paciente_id').val('');
    $('#data_consulta_id').val('');
    $('#profissional_id').val('');
    $('#realizada').val('');
    $('#observacoes').val('');
  }

  function deletarConsultaPaciente(consulta_paciente_id, paciente_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_consulta_paciente_id').val(consulta_paciente_id);
          $("#deletarConsultaForm #delete_paciente_id").val(paciente_id);
          $('#deletarConsultaForm').submit();
      }
  }
</script>
