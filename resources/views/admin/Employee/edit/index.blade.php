@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Funcionário')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">Funcionário</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Funcionário/li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Funcionário->{{ $employee->name }}</h6>
                        <a href="{{ route('admin.employees.index') }}" class="ms-text-primary">Listar Funcionário</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.employees.update', $employee->id) }}"    enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @include('forms._formEmployee.index')
                            <div class="col-md-12">

                                <div class="form-group text-center">


                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
