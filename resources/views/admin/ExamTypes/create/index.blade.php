@extends('layouts.merge.dashboard')
@section('titulo', 'Cadastrar Tipos de exames')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.examtypes.index') }}">Tipos de exames</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastrar Tipos de exames</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Cadastrar Tipos de exames</h6>
                        <a href="{{ route('admin.examtypes.index') }}" class="ms-text-primary">Listar Tipos de exames</a>
                    </div>
                    <div class="ms-panel-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" class="needs-validation row" novalidate
                            action="{{ route('admin.examtypes.store') }}">
                            @csrf
                            @include('forms._formExamtype.index')
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn px-5  col-md-4 btn-primary">
                                        Salvar
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
