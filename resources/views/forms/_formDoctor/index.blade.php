<div class="row">
    <div class="col-md-7">
        <div class="form-group">
            <label for="validationCustom220">Nome do Doctor</label>
            <input value="{{ isset($doctor->name) ? $doctor->name : old('name') }}" placeholder="Nome do Doctor"
                name="name" type="text" class="form-control " id="validationCustom001" required>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="validationCustom004">Endereço</label>
            <input value="{{ isset($doctor->adress) ? $doctor->adress : old('adress') }}" placeholder="Endereço"
                name="adress" type="text" class="form-control " id="validationCustom004" required>

        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="NIP">NIP</label>
            <input value="{{ isset($doctor->nip) ? $doctor->nip : old('nip') }}"
                placeholder="Digite o número de identificação pessoal" type="text" class="form-control "
                id="validationCustom005" name="nip" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Telefone">Telefone</label>
            <input value="{{ isset($doctor->tel) ? $doctor->tel : old('tel') }}" type="number"
                class="form-control " placeholder="Telefone" id="validationCustom005" name="tel"
                required>
        </div>
    </div>

    <div class="col-md-5">
        <label for="Email">Email </label>
        <div class="input-group">
            <input value="{{ isset($doctor->email) ? $doctor->email : old('email') }}" type="email"
                placeholder="Email" class="form-control " id="validationCustom005" name="email"
                required>
        </div>

    </div>

</div>



<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Número de ordem dos Doctor">Número de ordem do Doctor</label>
            <input value="{{ isset($doctor->doctorOrder) ? $doctor->doctorOrder : old('doctorOrder') }}" type="text"
                placeholder=" Digite o número de ordem do  Doctor" class="form-control "
                id="validationCustom005" name="doctorOrder" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="Especialidade">Especialidade </label>
            <select class="form-control " id="exampleSelect" name="fk_doctorSpecialties_id" required>
                <option disabled>Especialidades</option>
                @foreach ($specialtie as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12 ">
        <div class="form-group">
            <label>OBS </label>
            <textarea name="obs" class="form-control" id="editor1" rows="3">
             {{ isset($doctor->obs) ? $doctor->obs : old('obs') }}
                </textarea>

        </div>

    </div>
</div>

</div>
