@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes do funcionário')

@section('content')
    <form action="{{ url('admin/funcionario/delete') }}" method="POST">
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
                                <a href="{{ url('admin/funcionario/index') }}">Listar Funcionários</a>
                                > Detalhes do Funcionário - {{ $employee->name }}

                            </b></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <div class="col-12 mt-2">
                            <h5 class=""><b>Informações do  Funcionário </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome </b><br>
                                        <small>  {{ $employee->name }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Pai</b><br>
                                        <small>   {{ $employee->father }}

                                        </small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Mãe</b><br>
                                        <small>   {{ $employee->mother }}

                                        </small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Data de Nascimento</b><br>
                                        <small>   {{ $employee->birthDate }}

                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            B.I/Passaporte</b><br>
                                        <small> {{ $employee->bi }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Contactos</b><br>
                                        <small> {{ $employee->tel }} </small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            E-mail </b><br>
                                        <small>

                                            {{ $employee->email }}
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Endereço </b><br>
                                        <small>
                                            {{ $employee->address }}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Nip </b><br>
                                        <small>
                                            {{ $employee->nip }}
                                        </small>

                                    </p>
                                </div>
                            </div>



                        </div>


                        <div class="col-12 mt-2">
                            <h5 class=""><b>Outras Informações  </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Data do Contrato</b><br>
                                        <small>
                                            {{ $employee->contratDate }}
                                        </small>

                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Cargo  </b><br>
                                        <small>
                                            {{ $employee->positions->name }}
                                        </small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Tipo de Funcionário  </b><br>
                                        <small>
                                            {{ $employee->employeeType }}
                                        </small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Habilitacão Literária  </b><br>
                                        <small>
                                            {{ $employee->literaryQualification }}
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Ficheiro do Contrato  </b><br>
                                        <small>
                                            <a target="_blank" href="/storage/{{$employee->ContractFile }}"> Visualizar Anexo</a>
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
                                        {{ $employee->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>Última Actualização:</b>
                                        {{ $employee->updated_at }}
                                    </small>
                                </div>

                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href='{{ url("admin/funcionario/edit/{$employee->id}") }}'>
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $employee->id }}">
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
