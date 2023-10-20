@extends('template')
@section('conteudo')

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center p-2 rounded mb-5" style="background-color: #343957fe;">
                    <i class="ti-map-alt" style="font-size: 24px; color: #fff;"></i> <h3 class="mb-0 ml-2 text-white" style="color: #bbb !important;">Cidades</h3>
                </div>

                <a type="button" href="/cidade.create" class="btn btn-primary">Incluir</a>

                <table id="dataTable" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Alterar</th>
                            <th>Excluir</th>
                            <th>Nome</th>
                            <th>UF</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lista as $obj)

                            <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">

                            <tr>
                                <td width="1%">
                                    <a href="/cidade.edit.{{$obj->id}}"><i class="fa fa-edit"></i></a>
                                </td>

                                <td width="1%">
                                    <a href="/cidade.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash"></i></a>
                                </td>

                                <td>
                                    {{$obj->nome}}
                                </td>

                                <td>
                                    @foreach($estados as $estado)
                                        @if($estado->id == $obj->uf_id)
                                            {{$estado->nome}}
                                        @endif
                                    @endforeach
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
