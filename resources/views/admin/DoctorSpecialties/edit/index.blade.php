@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Especialidades')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.doctorspecialties.index') }}">Especialidade Doctores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Especialidades</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Especialidade->{{ $specialtie->name }}</h6>
                        <a href="{{ route('admin.doctorspecialties.index') }}" class="ms-text-primary">Listar Especialidades</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.doctorspecialties.update', $specialtie->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formDoctorSpecialtie.index')
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
