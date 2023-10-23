@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/refeicao.store" method="post">
    <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
    @csrf
    <div class="form-group">
        <label for="data">Data:</label>
        <input required type="date" class="form-control" id="data" name="data" placeholder="Insira a data da refeição"
        value="{{ $obj->data }}">
    </div>
    <div class="form-group">
            <label for="tipo">Tipo de Refeição</label>
            <select name="tipo" class="form-control" id="tipo">
                @foreach ([1, 2, 3, 4, 5, 6, 7] as $value)
                    <option value="{{ $value }}" {{ $obj->tipo == $value ? 'selected' : '' }}>
                        {{ $value === 1 ? 'Café da manhã' : ($value === 2 ? 'Lanche da manhã' : ($value === 3 ? 'Almoço' : ($value === 4 ? 'Lanche da tarde' : ($value === 5 ? 'Jantar' : ($value === 6 ? 'Lanche da noite' : 'Ceia'))))) }}
                    </option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label for="refeicao_para">Refeição para:</label><br>
        <div class="form-check">
            <input class="form-check-input" required type="radio" id="escolher_paciente" name="refeicao_para"
            value="Paciente" {{ $obj->paciente_id != null ? 'checked' : '' }}>
            <label class="form-check-label" for="escolher_paciente">
            Paciente
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" required type="radio" id="escolher_acompanhante" name="refeicao_para"
            value="Acompanhante" {{ $obj->acompanhante_id != null ? 'checked' : '' }}>
            <label class="form-check-label" for="escolher_acompanhante">
            Acompanhante
            </label>
        </div>
    </div>
    <div class="form-group" id="paciente_group" @if($obj->paciente_id == null)style="display:none"@endif>
        <label for="paciente_id">Paciente:</label>
        <select @if($obj->paciente_id != null) required @endif name="paciente_id" class="form-control" id="paciente_id" maxlength="45">
            <option value="" label="Selecione o paciente..." selected></option>
            @foreach ($listaPaciente as $paciente)
            <option value="{{ $paciente->id }}" label="{{ $paciente->nome }}"
            @if($obj->paciente_id == $paciente->id)
                selected
            @endif
            >{{ $paciente->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" id="acompanhante_group" @if($obj->acompanhante_id == null)style="display:none"@endif>
        <label for="acompanhante_id">Acompanhante:</label>
        <select @if($obj->acompanhante_id != null) required @endif name="acompanhante_id" class="form-control" id="acompanhante_id" maxlength="45">
            <option value="" label="Selecione o acompanhante..." selected></option>
            @foreach ($listaAcompanhante as $acompanhante)
            <option value="{{ $acompanhante->id }}" label="{{ $acompanhante->nome }}"
                @if($obj->acompanhante_id == $acompanhante->id)
                    selected
                @endif
            >{{ $acompanhante->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="servida">Servida:</label>
        <input type="checkbox" name="servida" id="servida"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->servida ? 'checked' : '' }}>
    </div>
    <div class="form-group">
        <a type="button" href="/refeicao.index" class="btn btn-warning">Fechar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
<script>
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
