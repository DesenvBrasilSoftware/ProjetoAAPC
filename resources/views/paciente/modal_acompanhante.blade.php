<!-- Modal Acomodacao Paciente -->
<div>
<div class="modal fade" id="modalAcompanhante" tabindex="-1" role="dialog"
  aria-labelledby="labelModalAcompanhante" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalAcompanhante">Adicionar acompanhante do paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/acompanhante.store">
          @csrf
          <div class="modal-body">
            <input id="acompanhante_id" type="hidden" name="acompanhante_id">
            <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}">
            <div class="form-group">
              <label for="grau">Grau:</label>
              <input type="text" name="grau" class="form-control" id="grau" maxlength="60" placeholder="Digite o grau de parentesco do acompanhante" >
            </div>
            <div class="form-group">
              <label for="profissaoAcom">Profissão:</label>
              <input type="text" name="profissaoAcom" class="form-control" id="profissaoAcom" maxlength="60" placeholder="Digite a profissão do acompanhante" >
            </div>
            <div class="form-group">
              <label for="moraJunto">Mora com o paciente:</label>
              <div class="checkbox-toggle">
                <input type="checkbox" data-toggle="toggle" name="moraJunto" id="moraJunto" data-on="Sim" data-off="Não">
              </div>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.telefone').mask('00 00000-0000');

  function abreModalEditAcompanhante(id, grau, profissao, moradia) {
    $('#acompanhante_id').val(id);
    $('#grau').val(grau);
    $('#profissaoAcom').val(profissao);
    if (moradia == 1) {
        $('#moraJunto').bootstrapToggle('on');
    }
    $('#modalAcompanhante').modal("show");
  }

  function abreModalAcompanhante(id) {
    $('#acompanhante_id').val(id);
    $('#grau').val('');
    $('#profissaoAcom').val('');
    $('#moradia').val('');
    $('#modalAcompanhante').modal("show");
  }

</script>
