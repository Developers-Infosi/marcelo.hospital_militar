@extends('layouts.merge.dashboardWithoutMenu')
@section('titulo', 'Erro 419')
@section('content')
    <!-- Main Content -->
    <main class="body-content ms-error-404">
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <i class="flaticon-computer"></i>
            <h1>419</h1>
            <h3>Ops! A sua sessão expirou!</h3>
            <a href="{{ route('admin.home') }}" class="btn btn-white"> <i class="material-icons">arrow_back</i> Back
                Home</a>
        </div>
    </main>


@endsection
