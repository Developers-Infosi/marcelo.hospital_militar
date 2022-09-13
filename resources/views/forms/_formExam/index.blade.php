<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Código da Consulta">Código da Consulta</label>
            <input readonly placeholder="Digite o Código da consulta"
                value="{{ isset($Exam->id) ? $Exam->id: old('id') }}" name="id" type="text"
                class="form-control" id="validationCustom001" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Nome do Pai">Nome do Paciente</label>

                <select name="fk_patients_id" class="form-control " aria-label="Default select example">
                    <option value="{{$Exam->Patients->id}}"> {{ $Exam->Patients->name }}</option> </select>

            </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Idade do Paciente"> Nome do Doctor</label>

                <select name="fk_doctors_id" class="form-control " aria-label="Default select example">
                    <option value="{{$Exam->Doctors->id}}"> {{ $Exam->Doctors->name }}</option> </select>
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="fk_nurses_id">Nome do    Enfermeiro </label>

            <select name="fk_nurses_id" class="form-control " aria-label="Default select example">
                <option value="{{ $Exam->Nurses->id }}"> {{ $Exam->Nurses->name }}</option> </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="Nacionalidade">Tipo de Exame</label>

            <select name="fk_examTypes_id" class="form-control " aria-label="Default select example">
                <option value="{{ $Exam->ExamTypes->id }}"> {{ $Exam->ExamTypes->examesNames }}</option> </select>

        </div>
    </div>
</div>


<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label for="examResult">Resultado do Exame </label>
        <textarea name="examResult" id="editor1" class="form-control"  rows="3">
         {{ isset($Exam->examResult) ? $Exam->examResult : old('examResult') }}
            </textarea>
    </div>
</div>
</div>
