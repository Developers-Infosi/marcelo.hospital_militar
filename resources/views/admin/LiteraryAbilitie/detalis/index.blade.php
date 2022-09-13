@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes do Habilitação Literario ')

@section('content')
    <form action="{{ url('admin/habilitacao-literario/delete') }}" method="POST">
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
                                <a href="{{ url('admin/habilitacao-literario/index') }}">Listar Habilitação Literario</a>
                                > Detalhes do Habilitação Literario - {{ $literary_abilities->name }}

                            </b></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <div class="col-12 mt-2">
                            <h5 class=""><b>Informações do Departamento </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b> Habilitação Literario </b><br>
                                        <small> {{ $literary_abilities->name }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Cadastrado Por </b><br>
                                        <small>
                                            {{-- $screenings->useres->name --}}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            OBS </b><br>
                                        <small>
                                            {{ $literary_abilities->name }}
                                        </small>

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
                                        {{ $literary_abilities->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>Última Actualização:</b>
                                        {{ $literary_abilities->updated_at }}
                                    </small>
                                </div>
                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href="{{ route('admin.literary_abilities.edit',$literary_abilities->id) }}">
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $literary_abilities->id }}">
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
