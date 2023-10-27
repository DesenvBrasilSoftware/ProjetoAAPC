<!-- Modal Enfermidade Paciente -->
<div>
    <div class="modal fade" id="modalEnfermidadePaciente" tabindex="-1" role="dialog"
        aria-labelledby="labelModalEnfermidade" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="labelModalEnfermidade">Cadastrar enfermidade do paciente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/paciente.adicionarEnfermidade">
            @csrf
            <div class="modal-body">
                <input id="enfermidade_paciente_id" type="hidden" name="enfermidade_paciente_id">
                <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}">
                <div class="form-group">
                <label for="data_cadastro_id">Data de cadastro:</label>
                <input type="date" class="form-control" id="data_cadastro_id" name="data_cadastro_id"
                    placeholder="Informe a data de cadastro">
                </div>
                <div class="form-group">
                <label for="enfermidade_id">Enfermidade:</label>
                <select name="enfermidade_id" class="form-control" id="enfermidade_id" maxlength="45">
                    <option value="" label="Selecione a enfermidade..."></option>
                    @foreach ($listaEnfermidade as $enfermidade)
                    <option value="{{ $enfermidade->id }}" label="{{ $enfermidade->descricao }}">
                    {{ $enfermidade->descricao }}
                    </option>
                    @endforeach
                </select>
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
    <form id="deletarEnfermidadeForm" method="POST" action="/paciente.deletarEnfermidade">
        @csrf
        <input type="hidden" name="delete_enfermidade_paciente_id" id="delete_enfermidade_paciente_id">
        <input type="hidden" name="delete_paciente_id" id="delete_paciente_id">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalEnfermidadePaciente').on('shown.bs.modal', function() {
    $('#data_cadastro_id').trigger('focus');
  });

  function abreModalEditEnfermidadePaciente(id, dataEntrada, enfermidade_id) {
    $('#enfermidade_paciente_id').val(id);
    $('#data_cadastro_id').val(dataEntrada);
    $('#enfermidade_id').val(enfermidade_id);
  }

  function abreModalEnfermidadePaciente() {
    $('#enfermidade_paciente_id').val('');
    $('#data_cadastro_id').val('');
    $('#enfermidade_id').val('');
  }

  function deletarEnfermidadePaciente(enfermidade_paciente_id, paciente_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_enfermidade_paciente_id').val(enfermidade_paciente_id);
          $('#delete_paciente_id').val(paciente_id);
          $('#deletarEnfermidadeForm').submit();
      } else {
          // Não faz nada se o usuário clicar em "Cancelar"
      }
  }
</script>
