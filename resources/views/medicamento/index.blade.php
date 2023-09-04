@extends('template')
@section('conteudo')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <a type="button" href="/medicamento.create" class="btn btn-primary">Incluir</a>

                    <table id="dataTable" class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Alterar</th>
                                <th>Excluir</th>
                                <th>Nome</th>
                                <th>Princípio ativo</th>
                                <th>Classificação</th>
                                <th>Classe terapêutica</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $obj)
                                <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
                                <tr>
                                    <td width="1%">
                                        <a href="/medicamento.edit.{{ $obj->id }}"><i class="fa fa-edit"
                                                style="align-content: center"></i></a>
                                    </td>
                                    <td width="1%">
                                        <a href="/medicamento.delete.{{ $obj->id }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>
                                        {{ $obj->nome }}
                                    </td>
                                    <td>
                                        {{ $obj->principio_ativo }}
                                    </td>
                                    <td>
                                        {{ $obj->classificacao }}
                                    </td>
                                    <td>
                                        {{ $obj->classe_terapeutica_id }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection