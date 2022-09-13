@extends('layouts.merge.dashboardWithoutMenu')
@section('titulo', 'Erro 404')
@section('content')
    <!-- Main Content -->
    <main class="body-content ms-error-404">
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <i class="flaticon-computer"></i>
            <h1>404</h1>
            <h3>Ops! Página não encontrada!</h3>
            <p>O link que você seguiu pode estar quebrado ou a página foi removida</p>
            <a href="{{ route('admin.home') }}" class="btn btn-white"> <i class="material-icons">arrow_back</i> Back Home</a>
        </div>
    </main>


@endsection
