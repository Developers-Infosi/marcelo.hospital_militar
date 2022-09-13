@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes da Receita')

@section('content')
    <form action="{{route('admin.prescriptions.delete') }}" method="POST">
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
                                <a href="{{route('admin.prescriptions.index') }}">Listar Receita</a>
                                > Detalhes da Receita - {{ $prescription->id }}

                            </b></h2>
                            <h2><a target="_black" href="{{ url('admin/receitas/receita',$prescription->id) }}">Imprimir Receita </a></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <div class="col-12 mt-2">
                            <h5 class=""><b>Informações do Paciente </b> </h5>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">



                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome do Paciente</b><br>
                                        <small> {{ $prescription->Patients->name }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Nome do Pai</b><br>
                                        <small> {{ $prescription->Patients->father }}</small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome da Mãe</b><br>
                                        <small> {{ $prescription->Patients->mother }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Idade do Paciente</b><br>
                                        <small> {{ $prescription->Patients->age }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Localização </b><br>
                                        <small> {{ $prescription->Patients->address }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Telefone</b><br>
                                        <small> {{ $prescription->Patients->tel }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nacionalidade</b><br>
                                        <small>{{ $prescription->Patients->nationality }} </small>
                                    </p>
                                </div>




                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Profissão </b><br>
                                        <small>

                                            {{ $prescription->Patients->profession }}
                                        </small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            De onde Vem </b><br>
                                        <small>
                                            {{ $prescription->Patients->from }}
                                        </small>

                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Ocupação </b><br>
                                        <small>
                                            {{ $prescription->Patients->occupation }}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Email </b><br>
                                        <small>
                                            {{ $prescription->Patients->email }}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-12 mt-2">
                                    <h5 class=""><b>Atendido por</b> </h5>
                                    <hr>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                     Doctor  </b><br>
                                        <small>
                                            {{ $prescription->Doctors->name }}
                                        </small>

                                    </p>
                                </div>
                                <div class="col-12 mt-2">
                                    <h5 class=""><b>Informações da Receita</b> </h5>
                                    <hr>
                                </div>
                                <div class="col-md-3">

                                    <p class="text-dark">
                                        <b>

                                     Receita  </b>
                                     <br>     <small>
                                            {!! html_entity_decode($prescription->description ) !!}
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
                                        {{ $prescription->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>Última Actualização:</b>
                                        {{ $prescription->updated_at }}
                                    </small>
                                </div>


                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href='{{  route('admin.prescriptions.edit',$prescription->id) }}'>
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $prescription->id }}">
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
