@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de  Habilitação Literaria')
@section('content')


    <div class="col-md-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                        Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.literary_abilities.index') }}">Habilitação Literaria</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Habilitação Literaria</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header ms-panel-custome">
                <h6>Lista de Habilitação Literaria</h6>
                <a href="{{ route('admin.literary_abilities.create') }}" class="ms-text-primary">Cadastrar Habilitação Literaria</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table w-100 thead-primary dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Código de Habilitação Literaria</th>
                                            <th>Habilitação Literaria</th>
                                            <th>Descricao da Habilitação Literaria</th>
                                            <th>ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($literary_abilities as $item)
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
                                                        href='{{ url("admin/habilitacao-literario/show/{$item->id}") }}'>Detalhes</a>
                                                </td>
                                            </tr>
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
