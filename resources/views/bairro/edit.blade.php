@extends('template')
@section('conteudo')
    <form class="needs-validation" novalidate id="form" action="/bairro.store" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ $obj->nome }}" autofocus placeholder="Informe o nome do bairro">
            </div>
            <div class="form-group">
                <label for="cidade_id">Cidade:</label>
                <select name="cidade_id" class="form-control" id="cidade_id">
                    @foreach($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ $cidade->id == $obj->cidade_id ? 'selected' : '' }}>
                            {{ $cidade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <a type="button" href="/bairro.index" class="btn btn-warning">Fechar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
@endsection
