@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/refeicao.store" method="post">
    @csrf
    <div class="form-group">
        <label for="data">Data:</label>
        <input required type="date" class="form-control" id="data" name="data" placeholder="Insira a data da refeição">
    </div>
    <div class="form-group">
        <label for="tipo">Tipo de Refeição</label>
        <select name="tipo" class="form-control" id="tipo">
            <option value="1">Café da manhã</option>
            <option value="2">Lanche da manhã</option>
            <option value="3">Almoço</option>
            <option value="4">Lanche da tarde</option>
            <option value="5">Jantar</option>
            <option value="6">Lanche da noite</option>
            <option value="7">Ceia</option>
        </select>
    </div>
    <div class="form-group">
        <label for="refeicao_para">Refeição para:</label><br>
        <div class="form-check">
            <input class="form-check-input" required type="radio" id="escolher_paciente" name="refeicao_para"
            value="Paciente" {{ old('refeicao_para') == '0' ? 'checked' : '' }}>
            <label class="form-check-label" for="escolher_paciente">
            Paciente
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" required type="radio" id="escolher_acompanhante" name="refeicao_para"
            value="Acompanhante" {{ old('refeicao_para') == '0' ? 'checked' : '' }}>
            <label class="form-check-label" for="escolher_acompanhante">
            Acompanhante
            </label>
        </div>
    </div>
    <div class="form-group" id="paciente_group">
        <label for="paciente_id">Paciente:</label>
        <select required name="paciente_id" class="form-control" id="paciente_id" maxlength="45">
            <option value="" label="Selecione o paciente..." selected></option>
            @foreach ($listaPaciente as $paciente)
            <option value="{{ $paciente->id }}" label="{{ $paciente->nome }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" id="acompanhante_group">
        <label for="acompanhante_id">Acompanhante:</label>
        <select required name="acompanhante_id" class="form-control" id="acompanhante_id" maxlength="45">
            <option value="" label="Selecione o acompanhante..." selected></option>
            @foreach ($listaAcompanhante as $acompanhante)
            <option value="{{ $acompanhante->id }}" label="{{ $acompanhante->nome }}">{{ $acompanhante->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="servida">Servida:</label>
        <input type="checkbox" name="servida" id="servida"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('servida') ? 'checked' : '' }}>
    </div>
    <div class="form-group">
        <a type="button" href="/medicamento.index" class="btn btn-warning">Fechar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
<script>
    // Inicialmente, desabilite ambos os campos
    document.getElementById('paciente_group').style.display = 'none';
    document.getElementById('acompanhante_group').style.display = 'none';

    // Adicione um evento de clique aos checkboxes para habilitar/desabilitar os campos
    document.getElementById('escolher_paciente').addEventListener('click', function () {
      if (this.checked) {
        document.getElementById('paciente_group').style.display = 'block';
        document.getElementById('paciente_id').setAttribute('required', 'required');
        document.getElementById('acompanhante_group').style.display = 'none';
        document.getElementById('acompanhante_id').removeAttribute('required');
      } else {
        document.getElementById('paciente_group').style.display = 'none';
        document.getElementById('paciente_id').removeAttribute('required'); // Remova o atributo required
      }
    });

    document.getElementById('escolher_acompanhante').addEventListener('click', function () {
      if (this.checked) {
        document.getElementById('acompanhante_group').style.display = 'block';
        document.getElementById('acompanhante_id').setAttribute('required', 'required');
        document.getElementById('paciente_group').style.display = 'none';
        document.getElementById('paciente_id').removeAttribute('required');
      } else {
        document.getElementById('acompanhante_group').style.display = 'none';
        document.getElementById('acompanhante_id').removeAttribute('required'); // Remova o atributo required
      }
    });
</script>
</div>
@endsection
