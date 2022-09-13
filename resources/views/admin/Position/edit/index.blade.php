@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Cargo')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.positions.index') }}">Tipo de Cargo </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Tipo de Cargo</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Tipo de Cargo->{{ $position->name }}</h6>
                        <a href="{{ route('admin.positions.index') }}" class="ms-text-primary">Listar Tipo de Cargo</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.positions.update', $position->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formPosition.index')

                            <button class="btn btn-primary mt-4 d-inline w-20 center " type="submit">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
