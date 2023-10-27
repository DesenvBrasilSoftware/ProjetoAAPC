<table id="dataTable" class="table table-stripped">
  <thead>
    <tr>
      <th>Entrada</th>
      <th>Saída</th>
      <th>Acomodação</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listaAcomodacaoPaciente as $acomodacaoPaciente)
    <tr>
      <td>
        {{ $acomodacaoPaciente->data_entrada }}
      </td>
      <td>
        {{ $acomodacaoPaciente->data_saida }}
      </td>
      <td>
        {{ $acomodacaoPaciente->acomodacao }}
      </td>
      <td width="1%">
        <a
          data-toggle="modal"
          data-target="#modalAcomodacaoPaciente"
          onclick="abreModalAcomodacaoPaciente(
            '{{ $acomodacaoPaciente->id }}',
            '{{ $acomodacaoPaciente->data_entrada }}',
            '{{ $acomodacaoPaciente->data_saida }}',
            '{{ $acomodacaoPaciente->acomodacao_id }}')
            "
        >
          <i class="fa fa-lg fa-edit"></i>
        </a>
      </td>
      <td width="1%">
        <a onclick="deletarAcomodacaoPaciente('{{ $acomodacaoPaciente->id }}', '{{ $obj->id }}')">
          <i class="fa fa-lg fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="form-group">
  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAcomodacaoPaciente">
    Adicionar acomodação
  </button>
</div>
<div class="form-group">
  <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
  <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<!-- Modal Acomodacao Paciente -->
<div class="modal fade" id="modalAcomodacaoPaciente" tabindex="-1" role="dialog" aria-labelledby="labelModalAcomodacao" aria-hidden="true">
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
          <!-- Adicione um formulário aqui -->
          @csrf
          <!-- Adicione o token CSRF -->
          <div class="modal-body">
            <input id="acomodacao_paciente_id" type="hidden" name="acomodacao_paciente_id" />
            <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}" />
            <div class="form-group">
              <label for="data_entrada_id">Entrada:</label>
              <input type="date" class="form-control" id="data_entrada_id" name="data_entrada_id" placeholder="Informe a data de entrada" />
            </div>
            <div class="form-group">
              <label for="data_saida_id">Saída:</label>
              <input type="date" class="form-control" id="data_saida_id" name="data_saida_id" placeholder="Informe a data de saída" />
            </div>
            <div class="form-group">
              <label for="acomodacao_id">Acomodação:</label>
              <select name="acomodacao_id" class="form-control" id="acomodacao_id" maxlength="45">
                <option value="" label="Selecione a acomodação..."></option>
                @foreach ($listaAcomodacao as $acomodacao)
                <option value="{{ $acomodacao->id }}" label="{{ $acomodacao->descricao }}">{{ $acomodacao->descricao }}</option>
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
    <input type="hidden" name="delete_acomodacao_paciente_id" id="delete_acomodacao_paciente_id" />
    <input type="hidden" name="delete_paciente_id" id="delete_paciente_id" />
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    $("#modalAcomodacaoPaciente").on("shown.bs.modal", function () {
      $("#data_entrada_id").trigger("focus");
    });

    function abreModalAcomodacaoPaciente(id, dataEntrada, dataSaida, acomodacao_id) {
      $("#modalAcomodacaoPaciente").on("shown.bs.modal", function () {
        $("#acomodacao_paciente_id").val(id);
        $("#data_entrada_id").val(dataEntrada);
        $("#data_saida_id").val(dataSaida);
        $("#acomodacao_id").val(acomodacao_id);

        $("#data_entrada_id").trigger("focus");
      });
    }

    function deletarAcomodacaoPaciente(acomodacao_paciente_id, paciente_id) {
      if (confirm("Tem certeza de que deseja excluir este item?")) {
        $("#delete_acomodacao_paciente_id").val(acomodacao_paciente_id);
        $("#delete_paciente_id").val(paciente_id);
        $("#deletarAcomodacaoForm").submit();
      } else {
        // Não faz nada se o usuário clicar em "Cancelar"
      }
    }
  </script>
</div>
