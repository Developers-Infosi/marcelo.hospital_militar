@extends('layouts.merge.dashboard')
@section('titulo', 'Cadastrar  Funcionário')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">Funcionário</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastrar  Funcionário</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Cadastrar  Departamento</h6>
                        <a href="{{ route('admin.employees.index') }}" class="ms-text-primary">Listar Funcionário</a>
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
                        <form method="POST" class="needs-validation" novalidate
                            action="{{ route('admin.employees.store') }}"    enctype="multipart/form-data">
                            @csrf
                            @include('forms._formEmployee.index')
                            <div class="col-md-12">


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>



@endsection
