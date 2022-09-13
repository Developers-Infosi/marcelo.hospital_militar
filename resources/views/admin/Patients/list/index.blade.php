@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Pacientes')
@section('content')


    <div class="col-md-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                        Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Pacientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Pacientes</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header ms-panel-custome">
                <h6>Lista de Pacientes</h6>
                <a href="{{ route('admin.patients.create') }}" class="ms-text-primary">Cadastrar Paciente</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table w-100 thead-primary dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Paciente</th>
                                            <th>Mãe</th>

                                            <th>Pai</th>
                                            <th> Telefone </th>

                                            <th>ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $item)
                                            <tr role="row" class="odd text-center">


                                                <td>
                                                    {{ $item->id }}
                                                </td>


                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->mother }}
                                                </td>
                                                <td>
                                                    {{ $item->father }}
                                                </td>
                                                <td>
                                                    {{ $item->tel }}
                                                </td>
                                                <td>
                                                    <a id="btn-details"
                                                        class="position-absolute top-0 start-100 translate-middle p-1 bg-primary rounded-circle"
                                                        href='{{ url("admin/pacientes/show/{$item->id}") }}'>
                                                        <i id="icon-view" class="fa fa-eye text-white "></i>
                                                    </a>
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
