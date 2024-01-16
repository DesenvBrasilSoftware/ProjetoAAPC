<!-- Modal Leito Acomodacao  -->
<div>
<div class="modal fade" id="modalLeitoAcomodacao" tabindex="-1" role="dialog"
    aria-labelledby="labelModalLeitoAcomodacao" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="labelLeitoAcomodacao">Cadastrar leito na acomodação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" action="/acomodacao.adicionarLeito">
        @csrf
        <div class="modal-body">
            <input id="leito_id" type="hidden" name="leito_id">
            <input id="acomodacao_id" type="hidden" name="acomodacao_id" value="{{ $obj->id }}">
            <div class="form-group">
            <label for="descricao_leito">Descrição:</label>
            <input type="text" class="form-control" id="descricao_leito" name="descricao_leito"
                placeholder="Informe a descrição do leito">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
    </div>
    </div>
</div>
<form id="deletarLeitoForm" method="POST" action="/acomodacao.deletarLeito">
    @csrf
    <input type="hidden" name="delete_leito_id" id="delete_leito_id">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalAcomodacaoPaciente').on('shown.bs.modal', function() {
    $('#descricao_leito').trigger('focus');
  });

  function abreModalEditLeitoAcomodacao(id, descricao) {
    console.log(descricao);
    $('#leito_id').val(id);
    $('#descricao_leito').val(descricao);
  }

  function abreModalLeitoAcomodacao(id, descricao) {
    $('#leito_id').val('');
    $('#descricao_leito').val('');
  }

  function deletarLeitoAcomodacao(leito_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_leito_id').val(leito_id);
          $('#deletarLeitoForm').submit();
      } else {
          // Não faz nada se o usuário clicar em "Cancelar"
      }
  }
</script>
