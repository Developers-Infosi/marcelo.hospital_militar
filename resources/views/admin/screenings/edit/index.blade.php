@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Triagem')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.screenings.index') }}">Lista da Triagem</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Triagem</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Triagem->{{ $screening->id }}</h6>
                        <a href="{{ route('admin.screenings.index') }}" class="ms-text-primary">Listar Triagem</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.screenings.update', $screening->id) }}">
                            @csrf
                            @method('put')
                            @csrf
                            @include('forms._formScreening.index')
                            <button class="btn btn-primary mt-4 d-inline w-20 center" type="submit">Actualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
