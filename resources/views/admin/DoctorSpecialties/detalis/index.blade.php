@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes da Especialidade')

@section('content')
    <form action="{{ url('admin/doctores-especialidade/delete') }}" method="POST">
        @csrf
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="category_id">
                        Tem certeza de que deseja excluir este item ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">



            <div class="ms-panel-body">

                <div class="card mb-2">
                    <div class="card-body">
                        <h2 class="h5 page-title"><b>
                                <a href="{{ url('admin/doctores-especialidade/index') }}">Listar Especialidades</a>
                                > Detalhes da especialidade - {{ $specialtie->name }}

                            </b></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <div class="col-12 mt-2">
                            <h5 class=""><b>Informa????es da especialidade </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome da Especialidade </b><br>
                                        <small> {{ $specialtie->name }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 my-5">
                            <hr>
                            <div class="row">

                                <div class="col-md-8">
                                    <small class="mb-1 text-dark">
                                        <b>Data de Cadastro:</b>
                                        {{ $specialtie->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>??ltima Actualiza????o:</b>
                                        {{ $specialtie->updated_at }}
                                    </small>
                                </div>


                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href='{{ url("admin/doctores-especialidade/edit/{$specialtie->id}") }}'>
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $specialtie->id }}">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </button>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>




@endsection
