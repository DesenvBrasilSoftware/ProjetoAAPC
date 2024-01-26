<!-- Modal Acomodacao Acompanhante -->
<div>
  <div
    class="modal fade"
    id="modalAcomodacaoAcompanhante"
    tabindex="-1"
    role="dialog"
    aria-labelledby="labelModalAcomodacao"
    aria-hidden="true"
  >

    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="labelModalAcomodacao">Adicionar acomodação do acompanhante</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
          <form method="POST" action="/acompanhante.adicionarAcomodacao">
            @csrf

            <div class="modal-body">
              <input id="leito_acompanhante_id" type="hidden" name="leito_acompanhante_id" />

              <input id="acompanhante_id" type="hidden" name="acompanhante_id" value="{{ $obj->id }}" />

              <div class="form-group">
                <label for="data_entrada_id">Entrada:</label>
                <input required type="date" class="form-control" id="data_entrada_id" name="data_entrada_id" placeholder="Informe a data de entrada" />
              </div>

              <div class="form-group">
                <label for="data_saida_id">Saída:</label>
                <input type="date" class="form-control" id="data_saida_id" name="data_saida_id" placeholder="Informe a data de saída" />
              </div>

              <div class="form-group">
                <label for="acomodacao_id">Acomodação:</label>

                <select required name="acomodacao_id" class="form-control" id="acomodacao_id" maxlength="45">
                  <option value="" label="Selecione a acomodação..."></option>

                  @foreach ($listaAcomodacao as $acomodacao)
                    <option value="{{ $acomodacao->id }}" label="{{ $acomodacao->descricao }}">
                      {{ $acomodacao->descricao }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="leito_id">Leito:</label>

                <select required name="leito_id" class="form-control" id="leito_id" maxlength="45">
                  <option value="" label="Selecione o leito..."></option>
                    @foreach ($listaLeito as $leito)
                      @if ($leito->ocupado != '1')
                        <option value="{{ $leito->id }}" label="{{ $leito->descricao }}" data-acomodacao-id="{{ $leito->acomodacao_id }}">
                          {{ $leito->descricao }}
                        </option>
                      @elseif($leito->ocupado == '1' && $leito->acompanhante_id == $obj->id)
                        <option value="{{ $leito->id }}" label="{{ $leito->descricao }}" data-acomodacao-id="{{ $leito->acomodacao_id }}">
                          {{ $leito->descricao }}
                        </option>
                      @endif
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

    <form id="deletarAcomodacaoForm" method="POST" action="/acompanhantente.deletarAcomodacao">
      @csrf
      <input type="hidden" name="delete_leito_acompanhante_id" id="delete_leito_acompanhante_id" />

      <input type="hidden" name="delete_acompanhante_id" id="delete_acompanhante_id" />
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#acomodacao_id").change(function () {
        var selectedAcomodacaoId = $(this).val();

        $("#leito_id option").hide();
        $('#leito_id option[data-acomodacao-id="' + selectedAcomodacaoId + '"]').show();
        $("#leito_id").val("");
      });
    });
  </script>

  <script>
    $("#modalAcomodacaoAcompanhante").on("shown.bs.modal", function () {
      $("#data_entrada_id").trigger("focus");
    });

    function abreModalEditAcomodacaoAcompanhante(id, dataEntrada, dataSaida, acomodacao_id, leito_id) {
      $("#leito_acompanhante_id").val(id);
      $("#data_entrada_id").val(dataEntrada);
      $("#data_saida_id").val(dataSaida);
      $("#acomodacao_id").val(acomodacao_id);
      $("#leito_id").val(leito_id);
    }

    function abreModalAcomodacaoAcompanhante() {
      $("#leito_acompanhante_id").val("");
      $("#data_entrada_id").val("");
      $("#data_saida_id").val("");
      $("#acomodacao_id").val("");
      $("#leito_id").val("");
    }

    function deletarAcomodacaoAcompanhante(leito_acompanhante_id, acompanhante_id) {
      if (confirm("Tem certeza de que deseja excluir este item?")) {
        $("#delete_leito_acompanhante_id").val(leito_acompanhante_id);
        $("#deletarAcomodacaoForm #delete_acompanhante_id").val(acompanhante_id);
        $("#deletarAcomodacaoForm").submit();
      }
    }
  </script>
</div>
