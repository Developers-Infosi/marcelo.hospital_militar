<div class="col-md-12">
    <div class="form-group">
        <label for="Nome da Consulta">Nome da Consulta</label>
        <input value="{{ isset($querytype->name) ? $querytype->name : old('name') }}" name="name"
            placeholder="Nome da Consulta" type="text" class="form-control " id="validationCustom001" required>

    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="Descrição">Descrição</label>
        <textarea name="description" rows="6" id="editor1" class="form-control " placeholder="Descrição do curso">
            {{ isset($querytype->description) ? $querytype->description : old('description') }}

        </textarea>
    </div>
</div>
</div>
