@extends('layouts.merge.dashboard')
@section('titulo', 'Cadastrar Exames')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.exams.index') }}">Exames</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastrar Exame</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Cadastrar Exame</h6>
                        <a href="{{ route('admin.exams.index') }}" class="ms-text-primary">Listar Exames</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                            action="{{ route('admin.exams.store') }}">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                            @endif
                            @csrf
                            @include('forms._formExam.index')
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
