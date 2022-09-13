<div class="col-md-12">
    <div class="form-group">
        <label for="Nome do Exame">Nome do Exame</label>
        <input required value="{{ isset($examtypes->examesNames) ? $examtypes->examesNames : old('examesNames') }}"
            placeholder="Nome do Exame" name="examesNames" type="text" class="form-control " id="validationCustom001"
            required>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="Descrição">Descrição</label>
            <textarea required name="description" rows="6" id="editor1" class="form-control " placeholder="Descrição do curso">
                {{ isset($examtypes->description) ? $examtypes->description : old('description') }}

            </textarea>
        </div>
    </div>
</div>
