<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Relatório de Pacientes - {{ date('d-m-Y') }}</title>
    <style>
        #footer {
            padding-top: 10px;
            padding-bottom: 0px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body style='height:auto; width:100%;  no-repeat center;'>

    <header class="col-12 mt-2 mb-5">
<center> <img class="img-center" src="dashboard/img/hospital.png" alt="" width="80"></center>



        <h3 class="text-center">HOSPITAL GERAL DE LUANDA</h3>


    </header>

    <section class="col-12">
        <b> Data </b> {{$patient->created_at}}  <br>
        <b> Processo Nº {{$patient->id}} </b>       <br>
         <b> Nome do Paciente</b> :{{$patient->name}} <br> <b> Idade</b> : {{$patient->age}}<br>
         <b> Nacionalidade</b> : {{$patient->nationality}} <br>
           <b>  Profissão</b> :  {{$patient->profession}}<br>
             <b> Ocupação</b>  :{{$patient->name}} <br>
               <b>De onde Vem</b> : {{$patient->from}}<br>
                <b>Localização</b> : {{$patient->address}} <br />
         <b> Filho de </b> {{$patient->father}}   <b> e de </b>  {{$patient->mother}}  <b>    <br />
            <b>Telefone</b> :{{$patient->tel}}<br>
            <b>OBS </b> :  {!! html_entity_decode($patient->obs ) !!}
    </section>


    <footer class="col-12 mt-2" id="footer">
        <div class="text-right">
            <img src="dashboard/img/ministerio.jpg" width="130">
        </div>
    </footer>
</body>

</html>
