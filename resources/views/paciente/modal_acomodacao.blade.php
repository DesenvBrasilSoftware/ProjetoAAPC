<!-- Modal Acomodacao Paciente -->
<div>
<div class="modal fade" id="modalAcomodacaoPaciente" tabindex="-1" role="dialog"
    aria-labelledby="labelModalAcomodacao" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="labelModalAcomodacao">Adicionar acomodação do paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="/paciente.adicionarAcomodacao">
        @csrf
        <div class="modal-body">
            <input id="acomodacao_paciente_id" type="hidden" name="acomodacao_paciente_id">
            <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}">
            <div class="form-group">
            <label for="data_entrada_id">Entrada:</label>
            <input type="date" class="form-control" id="data_entrada_id" name="data_entrada_id"
                placeholder="Informe a data de entrada">
            </div>
            <div class="form-group">
            <label for="data_saida_id">Saída:</label>
            <input type="date" class="form-control" id="data_saida_id" name="data_saida_id"
                placeholder="Informe a data de saída">
            </div>
            <div class="form-group">
            <label for="acomodacao_id">Acomodação:</label>
            <select name="acomodacao_id" class="form-control" id="acomodacao_id" maxlength="45">
                <option value="" label="Selecione a acomodação..."></option>
                @foreach ($listaAcomodacao as $acomodacao)
                <option value="{{ $acomodacao->id }}" label="{{ $acomodacao->descricao }}">
                {{ $acomodacao->descricao }}
                </option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
        </form>
    </div>
    </div>
</div>
<form id="deletarAcomodacaoForm" method="POST" action="/paciente.deletarAcomodacao">
    @csrf
    <input type="hidden" name="delete_acomodacao_paciente_id" id="delete_acomodacao_paciente_id">
    <input type="hidden" name="delete_paciente_id" id="delete_paciente_id">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalAcomodacaoPaciente').on('shown.bs.modal', function() {
    $('#data_entrada_id').trigger('focus');
  });

  function abreModalEditAcomodacaoPaciente(id, dataEntrada, dataSaida, acomodacao_id) {
    $('#acomodacao_paciente_id').val(id);
    $('#data_entrada_id').val(dataEntrada);
    $('#data_saida_id').val(dataSaida);
    $('#acomodacao_id').val(acomodacao_id);
  }

  function abreModalAcomodacaoPaciente(id, dataEntrada, dataSaida, acomodacao_id) {
    $('#acomodacao_paciente_id').val('');
    $('#data_entrada_id').val('');
    $('#data_saida_id').val('');
    $('#acomodacao_id').val('');
  }

  function deletarAcomodacaoPaciente(acomodacao_paciente_id, paciente_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_acomodacao_paciente_id').val(acomodacao_paciente_id);
          $("#deletarAcomodacaoForm #delete_paciente_id").val(paciente_id);
          $('#deletarAcomodacaoForm').submit();
      } else {
          // Não faz nada se o usuário clicar em "Cancelar"
      }
  }
</script>
