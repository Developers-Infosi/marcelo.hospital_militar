<div class="row">
    <div class="col-md-7">
        <div class="form-group">
            <label for="Nome do Enfermeiro/a">Nome do Enfermeiro/a</label>
            <input value="{{ isset($nurse->name) ? $nurse->name : old('name') }}" name="name" type="text"
                placeholder="Nome do Enfermeiro/a" class="form-control " id="validationCustom001"
                required>

        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="Endereço">Endereço</label>
            <input value="{{ isset($nurse->address) ? $nurse->address : old('address') }}" name="address" type="text"
                placeholder="Endereço" class="form-control " id="validationCustom004" required>

        </div>
    </div>



</div>

<div class="row">
 

    <div class="col-md-4">
        <div class="form-group">
            <label for="NIP">NIP</label>
            <input value="{{ isset($nurse->nip) ? $nurse->nip : old('nip') }}" type="text"
                class="form-control " placeholder="NIP" id="validationCustom005" name="nip" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Telefone">Telefone</label>
            <input value="{{ isset($nurse->tel) ? $nurse->tel : old('tel') }}" type="number"
                class="form-control " placeholder="Telefone" id="validationCustom005" name="tel"
                required>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="Posição">Posição</label>
            <input value="{{ isset($nurse->position) ? $nurse->position : old('position') }}" type="text"
                placeholder="Posição" class="form-control " id="validationCustom005" name="position"
                required>

        </div>
    </div>



</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Número de ordem dos Enfermeiros">Número de ordem dos Enfermeiros</label>
            <input value="{{ isset($nurse->nurseOrder) ? $nurse->nurseOrder : old('nurseOrder') }}" type="text"
                placeholder="Número de ordem dos Enfermeiros" class="form-control " id="validationCustom005"
                name="nurseOrder" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Email ">Email </label>
            <input value="{{ isset($nurse->email) ? $nurse->email : old('email') }}" type="email" placeholder="Email"
                class="form-control " id="validationCustom005" name="email" required>

        </div>

    </div>


</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="OBS">OBS </label>
            <textarea name="obs" class="form-control" id="editor1" id="exampleTextarea" rows="3">
                {{ isset($nurse->obs) ? $nurse->obs : old('obs') }}
                   </textarea>
        </div>
    </div>

</div>
