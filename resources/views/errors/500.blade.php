@extends('layouts.merge.dashboardWithoutMenu')
@section('titulo', 'Erro 500')
@section('content')
    <!-- Main Content -->
    <main class="body-content ms-error-404">
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <i class="flaticon-computer"></i>
            <h1>500</h1>
            <h3>Ops! Um erro aconteceu no servidor!</h3>
            <a href="{{ route('admin.home') }}" class="btn btn-white"> <i class="material-icons">arrow_back</i> Back
                Home</a>
        </div>
    </main>


@endsection
