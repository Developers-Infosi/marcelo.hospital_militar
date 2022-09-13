<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Nome do Paciente">Nome do Paciente</label>
            <input value="{{ isset($patient->name) ? $patient->name : old('name') }}" placeholder="Nome do Paciente"
                name="name" type="text" class="form-control " id="validationCustom001" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Nacionalidade">Nacionalidade</label>
            <input value="{{ isset($patient->nationality) ? $patient->nationality : old('nationality') }}"
                placeholder="Nacionalidade" type="text" class="form-control " id="validationCustom005"
                name="nationality" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Idade do Paciente">Idade do Paciente</label>
            <input value="{{ isset($patient->age) ? $patient->age : old('age') }}" placeholder="Idade do Paciente"
                name="age" type="number" class="form-control " id="validationCustom003" required>
        </div>
    </div>


</div>


<div class="row">


    <div class="col-md-6">
        <div class="form-group">
            <label for="Nome do Pai">Nome do Pai</label>
            <input value="{{ isset($patient->father) ? $patient->father : old('father') }}" placeholder="Nome do Pai"
                name="father" name="" type="text" class="form-control " id="validationCustom001" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Nome da Mãe">Nome da Mãe</label>
            <input value="{{ isset($patient->mother) ? $patient->mother : old('mother') }}" placeholder="Nome da Mãe"
                name="mother" type="text" class="form-control " id="validationCustom2" required>
        </div>
    </div>


</div>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="Localização">Localização</label>
            <input value="{{ isset($patient->address) ? $patient->address : old('address') }}" name="address"
                placeholder="Localização" type="text" class="form-control " id="validationCustom004" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Email">Email </label>
            <input value="{{ isset($patient->email) ? $patient->email : old('email') }}" type="email"
                placeholder="Email" class="form-control " id="validationCustom005" name="email" required>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="Telefone">Telefone</label>
            <input value="{{ isset($patient->tel) ? $patient->tel : old('tel') }}" type="text" class="form-control "
                placeholder="Telefone" id="Telefone" name="tel" required>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-4">
        <label for="De onde Vem">De onde Vem </label>
        <div class="form-group">
            <input value="{{ isset($patient->from) ? $patient->from : old('from') }}" type="text"
                placeholder="De onde Vem" class="form-control " id="validationCustom005" name="from" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="Profissão">Profissão</label>
            <input value="{{ isset($patient->profession) ? $patient->profession : old('profession') }}" type="text"
                placeholder="Profissão" class="form-control " id="validationCustom005" name="profession" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="Ocupação">Ocupação </label>
            <input value="{{ isset($patient->occupation) ? $patient->occupation : old('occupation') }}" type="text"
                placeholder="Ocupação" class="form-control " id="validationCustom005" name="occupation" required>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="OBS">OBS </label>
            <textarea name="obs" class="form-control" id="editor1" rows="3">
         {{ isset($patient->obs) ? $patient->obs : old('obs') }}
            </textarea>

        </div>
    </div>
