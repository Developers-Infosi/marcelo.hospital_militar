
@if(isset($Screening))



<div class="row">

    <input readonly="" value="{{ isset($Screening->Patients->id) ? $Screening->Patients->id : old('address') }}" name="fk_patients_id"
    type="hidden"  class="form-control " id="validationCustom004"
    required>
    <input readonly="" value="{{ isset($Screening->id) ? $Screening->id : old('address') }}" name="fk_queries_id"
    type="hidden"  class="form-control " id="validationCustom004"
    required>
    <input readonly="" value="{{ isset($Screening->id) ? $Screening->id : old('address') }}" name=" fk_screenings_id"
    type="hidden"  class="form-control " id="validationCustom004"
    required>

    <div class="col-md-8">
        <div class="form-group">
            <label for="Nome do Paciente">Nome do Paciente</label>
            <input readonly="" value="{{ isset($Screening->Patients->name) ? $Screening->Patients->name : old('address') }}" name="address"
                type="text" placeholder="Nome do Paciente" class="form-control " id="validationCustom004"
                required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="Codigo da Triagem">Código da Triagem</label>
            <input readonly="" value="{{ isset($Screening->id) ? $Screening->id : old('id') }}" name="name" type="text"
                placeholder="Codigo da Triagem" class="form-control " id="validationCustom001" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Idade">Idade</label>
            <input readonly value="{{ isset($Screening->Patients->age) ? $Screening->Patients->age : old('age') }}" type="number"
                placeholder="Idade" class="form-control " id="validationCustom005" name="age" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="Ocupação">Ocupação</label>
            <input readonly value="{{ isset($Screening->Patients->occupation) ? $Screening->Patients->occupation : old('occupation') }}"
                placeholder="Ocupação" type="text" class="form-control " id="validationCustom005"
                name="querieOrder" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="Enfermeiro ">Enfermeiro </label>
        <div class="form-group">
            <select name="fk_nurses_id" class="form-control " aria-label="Default select example">
                <option value="{{ isset($Screening->Nurses->id) ? $Screening->Nurses->id : old('id') }}"> {{ isset($Screening->Nurses->id) ? $Screening->Nurses->name : old('name') }}</option>
            </select>
        </div>
    </div>
    @endif
    <div class="col-md-{{ isset($querie) ? 12:  6  }}">
        <label for="Tipo de Exame">Tipo de Exame</label>
        <div class="form-group">

            <select required name="fk_examTypes_id" class="form-control " aria-label="Default select example">

@if(isset($querie->ExamTypes))
<option selected value="{{  $querie->ExamTypes->id }}"> {{ $querie->ExamTypes->examesNames}}</option>

@else

 @foreach ($exames as $item )
<option value="{{ $item->id }}"> {{ $item->examesNames }}</option>
@endforeach
@endif

            </select>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Descrição</label>
            <textarea required name="obs" rows="6" id="editor1" class="form-control  " placeholder="Descrição do curso">
                {{ isset($querie->obs) ?  $querie->obs: old('obs') }}
            </textarea>
        </div>
    </div>
</div>
