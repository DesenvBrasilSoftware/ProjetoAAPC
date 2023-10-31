<!-- Modal Item Entrada Doação -->
<div class="modal fade" id="modalItem" tabindex="-1" role="dialog"
  aria-labelledby="labelModalItem" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalItem">Cadastrar enfermidade do paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="modal-body">
            <div class="form-group">
              <label for="item_id">Item:</label>
              <select name="item_id" class="form-control" id="item_id" maxlength="45">
                <option value="" label="Selecione o item para doação..."></option>
                @foreach ($listaItem as $item)
                <option value="{{ $item->id }}" label="{{ $item->descricao }}">
                  {{ $item->descricao }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Informe a quantidade deste item..." />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="adicionarItem()">Adicionar</button>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
    // Função para adicionar um novo item à tabela
    function adicionarItem() {
        // Obter os valores do item selecionado e da quantidade do modal
        var item_id = document.getElementById('item_id').value;
        var quantidade = document.getElementById('quantidade').value;
        var itemNome = document.getElementById('item_id').options[document.getElementById('item_id').selectedIndex].text;

        // Verificar se ambos os campos foram preenchidos
        if (item_id && quantidade) {
            // Encontrar o elemento da tabela pelo ID
            var tabela = document.getElementById('tabela_itens').getElementsByTagName('tbody')[0];

            // Criar uma nova linha
            var newRow = tabela.insertRow(tabela.rows.length);

            // Adicionar as colunas
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);

            // Preencher as colunas com os valores dos campos do modal
            cell1.innerHTML = itemNome;
            cell2.innerHTML = quantidade;

            // Criar o botão de remoção
            var removeButton = document.createElement('a');
            removeButton.onclick = function() {
                removerItem(newRow);
            };
            removeButton.innerHTML = '<i class="fa fa-lg fa-trash"></i>';
            cell3.appendChild(removeButton);

            // Limpar os campos do modal
            document.getElementById('item_id').value = '';
            document.getElementById('quantidade').value = '';
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    }

    // Função para remover um item da tabela
    function removerItem(row) {
        row.remove(); // Remova a linha da tabela
    }
</script>