@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Tipos de exames')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.examtypes.index') }}">Tipos de exames</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Tipos de exames</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Tipo de Exame->{{ $examtypes->examesNames }}</h6>
                        <a href="{{ route('admin.examtypes.index') }}" class="ms-text-primary">Listar Tipos de Exames</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.examtypes.update', $examtypes->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formExamtype.index')
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
