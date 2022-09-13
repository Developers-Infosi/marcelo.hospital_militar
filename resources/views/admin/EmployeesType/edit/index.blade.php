@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Tipo Funcionario')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employees_types.index') }}">Tipo de Funcionário</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Tipo de Funcionário</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Tipo de Funcionário->{{ $employees_types->name }}</h6>
                        <a href="{{ route('admin.employees_types.index') }}" class="ms-text-primary">Listar Tipo de Funcionario</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.employees_types.update', $employees_types->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formEmployeesType.index')
                            <button class="btn btn-primary mt-4 d-inline w-20 center" type="submit">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
