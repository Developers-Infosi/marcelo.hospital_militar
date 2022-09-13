@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes do Utilizador')

@section('content')
    <form action="{{ url('admin/user/delete') }}" method="POST">
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
                                <a href="{{ url('admin/user/index') }}">Listar Utilizadores</a>
                                >Detalhes do Utilizador - {{ $user->name }}

                            </b></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <div class="col-12 mt-2">
                            <h5 class=""><b>Informações do Utilizador </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome </b><br>
                                        <small> {{ $user->name }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                         Email</b><br>
                                        <small> {{ $user->email }}</small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Função</b><br>
                                        <small> {{ $user->level }}</small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Email </b><br>
                                        <small>
                                            {{ $user->email }}
                                        </small>

                                    </p>
                                </div>

                        <div class="col-12 my-5">
                            <hr>
                            <div class="row">

                                <div class="col-md-8">
                                    <small class="mb-1 text-dark">
                                        <b>Data de Cadastro:</b>
                                        {{ $user->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>Última Actualização:</b>
                                        {{ $user->updated_at }}
                                    </small>
                                </div>
                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href='{{ url("admin/user/edit/{$user->id}") }}'>
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $user->id }}">
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




    <div class="col-xl-12 col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header ms-panel-custome">
                <h6>Registro de Actividades</h6>

            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <div  class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table w-100 thead-primary dataTable no-footer">
             <thead>
                    <tr>
                        <th>ID</th>
                        <th class="text-left">CAMINHO</th>
                        <th>IP</th>
                        <th class="text-left">MENSAGEM</th>
                        <th class="text-center">DATA</th>
                    </tr>
                </thead>
                                    <tbody>    @foreach ($logs as $item)
                                        <tr role="row" class="odd">


                                            <td>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{ $item->id }}</font>
                                                </font>
                                            </td>


                                <td class="text-left">{{ $item->PATH_INFO }} </td>
                                <td>{{ $item->REMOTE_ADDR }} </td>
                                <td class="text-left">{{ $item->message }} </td>
                                <td>{{ $item->created_at }} </td>


                                    </tr>    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
