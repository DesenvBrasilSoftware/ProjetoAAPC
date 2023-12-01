@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/contasAPagar.store" method="post">
    @csrf
    <div class="form-group">
        <label for="data">Data:</label>
        <input required type="date" value="{{old('data')}}" class="form-control" id="data" name="data" placeholder="Insira a data da conta">
    </div>
    <div class="form-group" id="paciente_group">
        <label for="pessoa_id">Pessoa:</label>
        <select required name="pessoa_id" class="form-control" id="pessoa_id" maxlength="45" value="{{old('pessoa_id')}}" >
            <option value="" label="Selecione a pessoa..." selected></option>
            @foreach ($listaPessoas as $pessoa)
            <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="valor_pagar">Valor a pagar:</label>
        <input type="text" value="{{old('valor_pagar')}}" name="valor_pagar" id="valor_pagar" class="dinheiro form-control">
    </div>
    <div class="form-group">
        <label for="valor_pago">Valor Pago:</label>
        <input type="text" name="valor_pago" value="{{old('valor_pago')}}"  id="valor_pago" class="dinheiro form-control">
    </div>
    <div class="form-group">
        <a type="button" href="/contasAPagar.index" class="btn btn-warning">Fechar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(".dinheiro").mask("#.###.###.###.###.###,00", { reverse: true });
</script>
@endsection
