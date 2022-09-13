@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Pacientes')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Pacientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Paciente</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Paciente->{{ $patient->name }}</h6>
                        <a href="{{ route('admin.patients.index') }}" class="ms-text-primary">Listar Pacientes</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.patients.update', $patient->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formPacient.index')
                            <div class="col-md-12">

                                <div class="form-group text-center">
                                    <button type="submit" class="btn px-5 col-md-4  btn-primary">
                                        Salvar alterações
                                        <span class="fe fe-chevron-right fe-16"></span>
                                    </button>
            
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
