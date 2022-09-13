@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes da consulta')

@section('content')
    <form action="{{route('admin.queries.delete') }}" method="POST">
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
                                <a href="{{route('admin.queries.index') }}">Listar Consultas</a>
                                > Detalhes da Consulta - {{ $querie->id }}

                            </b></h2>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">


                        <div class="col-12">
                            <div class="row">


                                <div class="col-12 mt-2">
                                    <h5 class=""><b>Informações do Paciente</b> </h5>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome do Paciente</b><br>
                                        <small> {{ $querie->Screenings->Patients->name }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Nome do Pai</b><br>
                                        <small> {{ $querie->Patients->father }}</small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nome da Mãe</b><br>
                                        <small> {{ $querie->Patients->mother }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Idade do Paciente</b><br>
                                        <small> {{ $querie->Patients->age }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Localização </b><br>
                                        <small> {{ $querie->Patients->address }}</small>
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Telefone</b><br>
                                        <small> {{ $querie->Patients->tel }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Nacionalidade</b><br>
                                        <small>{{ $querie->Patients->nationality }} </small>
                                    </p>
                                </div>




                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            Profissão </b><br>
                                        <small>

                                            {{ $querie->Patients->profession }}
                                        </small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            De onde Vem </b><br>
                                        <small>
                                            {{ $querie->Patients->from }}
                                        </small>

                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Ocupação </b><br>
                                        <small>
                                            {{ $querie->Patients->occupation }}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            Email </b><br>
                                        <small>
                                            {{ $querie->Patients->email }}
                                        </small>

                                    </p>
                                </div>

                            </div>
                        </div>



                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <h5 class=""><b>Informações da Triagem </b> </h5>
                                    <hr>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Peso </b><br>
                                        <small> {{ $querie->Screenings->weight }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Temperatura </b><br>
                                        <small> {{ $querie->Screenings->temperature }}</small>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Frequência Cardíaca </b><br>
                                        <small> {{ $querie->Screenings->heartRate }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Frequência Respiratória</b><br>
                                        <small> {{ $querie->Screenings->respiratoryFrequency }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>   Tensão Arterial</b><br>
                                        <small> {{ $querie->Screenings->bloodPressure }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>pulso</b><br>
                                        <small> {{ $querie->Screenings->pulse }}</small>
                                    </p>
                                </div>


                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>
                                            OBS da Triagem </b><br>
                                        <small>
                                            {!! html_entity_decode($querie->Screenings->obs) !!}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-12 mt-2">
                                    <h5 class=""><b>Atendido por </b> </h5>
                                    <hr>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                           Enfermeiro  </b><br>
                                        <small>
                                            {{ $querie->Nurses->name }}
                                        </small>

                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                     Doctor  </b><br>
                                        <small>
                                            {{ $querie->Doctors->name }}
                                        </small>

                                    </p>
                                </div>
                                <div class="col-12 mt-2">
                                    <h5 class=""><b> Informações da Consulta</b> </h5>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>Tipo de Exame </b><br>
                                        <small> {{ $querie->ExamTypes->examesNames }}</small>
                                    </p>

                                </div>

                                <div class="col-md-3">
                                    <p class="text-dark">
                                        <b>

                                            OBS da Consulta </b><br>
                                        <small>

                                            {!! html_entity_decode($querie->obs ) !!}
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
                                        {{ $querie->created_at }}
                                    </small><br>
                                    <small class="mb-1 text-dark">
                                        <b>Última Actualização:</b>
                                        {{ $querie->updated_at }}
                                    </small>
                                </div>



                                <div class="col-md-4 text-dark text-right">
                                    <a type="button" class="btn btn-primary text-left text-white mb-2 btn-fw"
                                        href='{{  route('admin.queries.edit',$querie->id) }}'>
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    <br>

                                    <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn"
                                        value="{{ $querie->id }}">
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
