@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Tipo de Contrato')
@section('content')


    <div class="col-md-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                        Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contracts_types.index') }}">Tipo de Contrato</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Tipo de Contrato</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header ms-panel-custome">
                <h6>Lista de Tipo de Contrato</h6>
                <a href="{{ route('admin.contracts_types.create') }}" class="ms-text-primary">Cadastrar Tipo de Contrato</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table w-100 thead-primary dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Código de Tipo de Contrato</th>
                                            <th>Tipo de Contrato</th>
                                            <th>Descricao do Tipo de Contrato</th>
                                            <th>ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contracts_types as $item)



                                        <tr role="row" class="odd">


                                            <td>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{ $item->id }}
                                                    </font>
                                                </font>
                                            </td>


                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->description }}
                                            </td>

                                            <td>

                                                <a class="btn btn-primary text-white btn-sm"
                                                    href='{{ url("admin/tipo-contrato/show/{$item->id}") }}'>Detalhes</a>


                                            </td>






                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
