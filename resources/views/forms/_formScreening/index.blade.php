
@if (isset($patient))
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Código do Paciente">Código do Paciente</label>
            <input readonly value="{{ $patient->id }}" id="sub_category_name"
                value="{{ isset($screening->Patients->id) ? $screening->Patients->id : old('codePatientsPatients') }}"
                placeholder="Código do Paciente" type="number" class="form-control " required>
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <label for="Paciente">Paciente</label>
            <select id="sub_category" name="fk_patients_id" class="form-control ">
                @if (isset($patient))
                    <option selected value="{{ $patient->id }}">{{ $patient->name}}
                    </option>
                @else
                    <option>selecione uma outra opção</option>
                @endif
            </select>
        </div>
    </div>


</div>


@endif

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Altura">Altura</label>
            <input value="{{ isset($screening->height) ? $screening->height : old('height') }}" name="height"
                placeholder="Altura" type="text" class="form-control " id="" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="Peso">Peso</label>
            <input value="{{ isset($screening->weight) ? $screening->weight : old('weight') }}" name="weight"
                placeholder="Peso" type="text" class="form-control " id="" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="Temperatura">Temperatura</label>
            <input value="{{ isset($screening->temperature) ? $screening->temperature : old('temperature') }}"
                placeholder="Temperatura" name="temperature" type="text" class="form-control " id="" required>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Frequência Cardíaca">Frequência Cardíaca</label>
            <input value="{{ isset($screening->heartRate) ? $screening->heartRate : old('heartRate') }}"
                placeholder="Frequência Cardíaca" name="heartRate" type="text" class="form-control "
                id="validationCustom004" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Frequência Respiratória">Frequência Respiratória</label>
            <input
                value="{{ isset($screening->respiratoryFrequency) ? $screening->respiratoryFrequency : old('respiratoryFrequency') }}"
                placeholder="Frequência Respiratória" name="respiratoryFrequency" type="text" class="form-control "
                id="validationCustom004" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Tensão Arterial">Tensão Arterial</label>
            <input value="{{ isset($screening->bloodPressure) ? $screening->bloodPressure : old('bloodPressure') }}"
                placeholder="Tensão Arterial" type="text" class="form-control " id="validationCustom005"
                name="bloodPressure" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="Pulso">Pulso </label>
            <input value="{{ isset($screening->pulse) ? $screening->pulse : old('pulse') }}" type="text"
                placeholder="Pulso" class="form-control " id="validationCustom005" name="pulse" required>
        </div>
    </div>
</div>
    <div class="col-md-12">
        <div class="form-group">
            <label>OBS </label>
            <textarea name="obs" id="editor1" class="form-control" id="exampleTextarea" rows="3">
{{ isset($screening->obs) ? html_entity_decode($screening->obs)  : old('obs') }}


            </textarea>
        </div>
    </div>
