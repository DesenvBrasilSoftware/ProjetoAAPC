@extends('template')
@section('conteudo')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <a type="button" href="/grupoItem.create" class="btn btn-primary">Incluir</a>

                    <table id="dataTable" class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Alterar</th>
                                <th>Excluir</th>
                                <th>Descrição</th>
                                <th>Perecivel</th>
                                <th>Refrigerado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $obj)
                                <input type="hidden" id="id_{{ $obj->id }}" value="{{ $obj->id }}">
                                <tr>
                                    <td width="1%">
                                        <a href="/grupoItem.edit.{{ $obj->id }}"><i class="fa fa-edit"
                                                style="align-content: center"></i></a>
                                    </td>
                                    <td width="1%">
                                        <a href="/grupoItem.delete.{{ $obj->id }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>
                                        {{ $obj->descricao }}
                                    </td>
                                    <td>
                                        {{ $obj->perecivel }}
                                    </td>
                                    <td>
                                        {{ $obj->refrigerado }}
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
