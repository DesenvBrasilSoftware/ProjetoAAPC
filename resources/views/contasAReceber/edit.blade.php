@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/contasAReceber.store" method="post">
    <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
    @csrf
    <div class="form-group">
        <label for="data">Data:</label>
        <input required type="date" class="form-control" id="data" name="data" placeholder="Insira a data da refeição"
        value="{{ $obj->data }}"        
        >   
    </div>
    
    <div class="form-group" id="paciente_group">
        <label for="pessoa_id">Pessoa:</label>
        <select required name="pessoa_id" class="form-control" id="pessoa_id" maxlength="45">
            <option value="" label="Selecione a pessoa..." selected></option>
            @foreach ($listaPessoas as $pessoa)
            <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}"
            @if($obj->pessoa_id == $pessoa->id)
                selected
            @endif
            >{{ $pessoa->nome }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="valor_receber">Valor a receber:</label>
        <input type="float" name="valor_receber" id="valor_receber" class="form-control" value="{{ $obj->valor_a_receber }}">
    </div>
    <div class="form-group">
        <label for="valor_recebido">Valor Recebido:</label>
        <input type="float" name="valor_recebido" id="valor_recebido" class="form-control" value="{{ $obj->valor_recebido }}">
    </div>
    <div class="form-group">
        <a type="button" href="/" class="btn btn-warning">Fechar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>
@endsection
