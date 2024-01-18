<!-- Modal Enfermidade Paciente -->
<div>
    <div class="modal fade" id="modalKitItem" tabindex="-1" role="dialog"
        aria-labelledby="labelModalKitItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="labelModalKitItem">Cadastrar itens do kit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/item.adicionarKitItem">
            @csrf
            <div class="modal-body">
                <input id="kit_item_id" type="hidden" name="kit_item_id">
                <input id="item_kit_id" type="hidden" name="item_kit_id" value="{{ $obj->id }}">
                <div class="form-group">
                <label for="item_composicao_id">Item:</label>
                <select name="item_composicao_id" class="form-control" id="item_composicao_id" maxlength="45">
                    <option value="" label="Selecione o item..."></option>
                    @foreach ($listaItem as $item)
                    <option value="{{ $item->id }}" label="{{ $item->descricao }}">
                    {{ $item->descricao }}
                    </option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="quantidade_item_composicao">Quantidade:</label>
                  <input type="number" class="form-control" id="quantidade_item_composicao" name="quantidade_item_composicao" value="{{ $obj->quantidade }}"
                    placeholder="Informe a quantidade desse item no kit..." step="any">
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
    <form id="deletarEnfermidadeForm" method="POST" action="/item.deletarKitItem">
        @csrf
        <input type="hidden" name="delete_kit_item_id" id="delete_kit_item_id">
        <input type="hidden" name="delete_item_id" id="delete_item_id">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalKitItem').on('shown.bs.modal', function() {
    $('#item_composicao_id').trigger('focus');
  });

  function abreModalEditKitItem(id, item_composicao_id, quantidade_item_composicao) {
    $('#kit_item_id').val(id);
    $('#item_composicao_id').val(item_composicao_id);
    $('#quantidade_item_composicao').val(quantidade_item_composicao);
  }

  function abreModalKitItem() {
    $('#kit_item_id').val('');
    $('#item_composicao_id').val('');
    $('#quantidade_item_composicao').val('');
  }

  function deletarKitItem(kit_item_id, item_kit_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_kit_item_id').val(kit_item_id);
          $("#delete_item_id").val(item_kit_id);
          $('#deletarEnfermidadeForm').submit();
      } else {
          // Não faz nada se o usuário clicar em "Cancelar"
      }
  }
</script>
