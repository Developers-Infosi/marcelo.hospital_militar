@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Tipo de Contrato')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="material-icons">home</i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contracts_types.index') }}">Tipo de Contrato</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Tipo de Contrato</li>
                </ol>
            </nav>

            <div class="col-xl-12 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header ms-panel-custome">
                        <h6>Editar Tipo de Contrato->{{ $contracts_types->name }}</h6>
                        <a href="{{ route('admin.contracts_types.index') }}" class="ms-text-primary">Listar Cargo</a>
                    </div>
                    <div class="ms-panel-body">
                        <form method="POST" class="needs-validation" novalidate
                        method="POST" action="{{ route('admin.contracts_types.update', $contracts_types->id) }}">
                            @csrf
                            @method('put')
                            @include('forms._formContactsType.index')
                            <button class="btn btn-primary mt-4 d-inline w-20 center" type="submit">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
