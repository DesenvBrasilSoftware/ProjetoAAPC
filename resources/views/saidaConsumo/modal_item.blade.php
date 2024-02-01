<!-- Modal Saida Doação Item -->
<div>
    <div class="modal fade" id="modalSaidaConsumoItem" tabindex="-1" role="dialog"
        aria-labelledby="labelModalSaidaConsumoItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="labelModalSaidaConsumoItem">Adicionar item para saída</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" novalidate method="POST" action="/saidaConsumo.adicionarItem">
            @csrf
            <div class="modal-body">
                <input id="saida_consumo_item_id" type="hidden" name="saida_consumo_item_id">
                <input id="saida_consumo_id" type="hidden" name="saida_consumo_id" value="{{ $obj->id }}">
                <div class="form-group">
                <label for="item_id">Item:</label>
                <select required name="item_id" class="form-control" id="item_id" maxlength="45">
                    <option value="" label="Selecione o item da saída..."></option>
                    @foreach ($listaItem as $item)
                    <option value="{{ $item->id }}" label="{{ $item->descricao }}">
                    {{ $item->descricao }}
                    </option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input required type="number" class="form-control" id="quantidade" name="quantidade"
                    placeholder="Informe a quantidade...">
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
    <form id="deletarSaidaConsumoItem" method="POST" action="/saidaConsumo.deletarItem">
        @csrf
        <input type="hidden" name="delete_saida_consumo_item_id" id="delete_saida_consumo_item_id">
        <input type="hidden" name="delete_saida_consumo_id" id="delete_saida_consumo_id">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalSaidaConsumoItem').on('shown.bs.modal', function() {
    $('#saida_consumo_item_id').trigger('focus');
  });

  function abreModalEditSaidaConsumoItem(id, quantidade, item_id) {
    console.log(id,quantidade, item_id)
    $('#saida_consumo_item_id').val(id);
    $('#quantidade').val(quantidade);
    $('#item_id').val(item_id);
  }

  function abreModalSaidaConsumoItem() {
    $('#saida_consumo_item_id').val('');
    $('#quantidade').val('');
    $('#item_id').val('');
  }

  function deletarSaidaConsumoItem(saida_consumo_item_id, saida_consumo_id) {
      if (confirm('Tem certeza de que deseja excluir este item?')) {
          $('#delete_saida_consumo_item_id').val(saida_consumo_item_id);
          $('#delete_saida_consumo_id').val(saida_consumo_id);
          $('#deletarSaidaConsumoItem').submit();
      } else {
          // Não faz nada se o usuário clicar em "Cancelar"
      }
  }
</script>
